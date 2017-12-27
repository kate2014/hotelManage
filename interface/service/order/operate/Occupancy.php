<?php
namespace service\order\operate;
use service\order\Order;
use service\order\Room;

class Occupancy extends Operate {
    protected $costBill;
    protected $room;
    protected $guest;
    protected $roomId;
    public function room($roomId,$start,$quantity){
        $this->roomId=$roomId;
        $this->room=[['roomId'=>$roomId,'startTime'=>$start,'quantity'=>$quantity]];
        return $this;
    }

    public function guest(array $guests){
        $this->guest=$guests;
        return $this;
    }
    protected function beforeOrder(Order $order)
    {
        $this->costBill=$this->generateBill($order);
        if(!$this->costBill){
            return false;
        }
        if(($discount=$order->calculateDiscount())===false){
            $this->setError($order->getError());
            return false;
        }
        $totalAmount=$this->costBill->getTotalAmount();
        $payableAmount=$totalAmount-$discount;
        $order->setIsReverse(false);
        $order->setAmount($totalAmount);
        $order->setPayableAmount($payableAmount);
        $order->setPaidAmount($this->getPayingAmount());
        $order->setDefferAmount($payableAmount-$this->getPayingAmount());
        return true;
    }

    protected function afterOrder(Order $order)
    {
        if(!$this->costBill->occupancy($order)){
            $this->setError($this->costBill->getError());
            return false;
        }
        if(!$this->recordOccupancy($order,Room::byId($order->getMerchant(),$this->roomId),$this->guest)){
            return false;
        }
        if(!$this->savePay($order)){
            return false;
        }
        return true;
    }
}