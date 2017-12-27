<?php
namespace service\order\operate;
use service\order\Order;

class Reverse extends Operate{
    protected $costBill;
    protected $rooms;
    public function room($rooms){
        $this->rooms=$rooms;
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
        $order->setIsReverse();
        $order->setAmount($totalAmount);
        $order->setPayableAmount($payableAmount);
        $order->setDefferAmount($payableAmount-$this->getPayingAmount());
        return true;
    }

    protected function afterOrder(Order $order)
    {
        if(!$this->costBill->reverse($order)){
            $this->setError($this->costBill->getError());
            return false;
        }
        if(!$this->savePay($order)){
            return false;
        }
        return true;
    }
}