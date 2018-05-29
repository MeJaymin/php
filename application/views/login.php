<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<script src="<?php echo ASSETS_URL; ?>js/jquery.js"></script>
    <script src="<?php echo ASSETS_URL; ?>js/jquery.validate.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>js/additional-methods.min.js"></script>
    <style>
    .error{
    	color: red;
    }
	</style>
</head>
<body>
	<?php
	$attributes = array('name' => 'login', 'id' => 'login');
	echo form_open_multipart('login', $attributes);
	?>
	<div name="email">
		<label>Email: </label>
		<input type="email" name="email" id="email">
	</div>
	<div name="password">
		<label>Password: </label>
		<input type="password" name="password" id="password">
	</div>
	<div name="submit">
		<input type="submit" name="submit" value="Login">
	</div>
	<?php echo form_close();?>
</body>

<script src="<?php echo ASSETS_URL.'js/register.js';?>"></script>

</html>









