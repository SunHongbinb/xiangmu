<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\erqi\public/../application/index\view\aaa\index.html";i:1562751302;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加订单</title>
</head>
<body>
	<form action="<?php echo url('index/aaa/pagepay'); ?>" method="post">
		<input type="text" name="WIDout_trade_no" value=""><br>
		<input type="text" name="WIDsubject" value=""><br>
		<input type="text" name="WIDtotal_amount" value=""><br>
		<input type="text" name="WIDbody" value=""><br>
		<input type="submit">
	</form>
	
</body>
</html>