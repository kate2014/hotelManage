<?php include 'common/header.php';?>
<div class="container">
	<?php include 'common/sidebar_system.php';?>
	<div class="frame">
		<form action="" class="form">
			<div class="mb20">
				<div class="label">字典类型：</div>
				<input type="text" class="input">
			</div>
			<div class="mb20">
				<div class="label">唯一代码：</div>
				<input type="text" class="input">
			</div>
			<div class="mb20">
				<div class="label">字典说明：</div>
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