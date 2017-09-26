<?php include 'common/header.php';?>
<div class="container">
	<?php include 'common/sidebar_house.php';?>
	<div class="frame">
		<form action="house_type.php" class="form">
			<div class="mb20">
				<div class="label">房屋类型：</div>
				<input type="text" class="input">
			</div>
			<div class="mb20">
				<div class="label">默认价格：</div>
				<input type="text" class="input">
			</div>
			<div class="mb20">
				<div class="label">钟点房开关：</div>
				<select name="" id="" class="select">
					<option value="">开</option>
					<option value="" selected="selected">关</option>
				</select>
			</div>
			<div class="mb20">
				<div class="label">钟点房时间：</div>
				<input type="time" class="input input_half">
				<input type="time" class="input input_half">
			</div>
			<div class="mb20">
				<div class="label">类型说明：</div>
				<textarea name="" id="" cols="30" rows="10" class="textarea"></textarea>
			</div>
			<a class="btn" href="javascript:history.go(-1)">取消</a>
			<button class="btn" type="submit">提交后退出</button>
			<button class="btn" type="reset">提交并新增</button>
		</form>
	</div>
</div>
</div>
<?php include 'common/footer.php';?>