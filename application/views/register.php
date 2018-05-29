<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
$attributes = array('name' => 'register', 'id' => 'register');
echo form_open_multipart('register', $attributes);
?>
	<div name="fullname">
		<label>Full Name: </label>
		<input type="text" name="fullname" id="fullname">
	</div>
	<div name="email">
		<label>Email: </label>
		<input type="email" name="email" id="email">
	</div>
	<div name="password">
		<label>Password: </label>
		<input type="password" name="password" id="password">
	</div>
	<div>
		<label>Gender: </label>
		<input type="radio" name="gender" value="1" />Male
		<input type="radio" name="gender" value="0" />Female
	</div>
	<div name="education">
		<label>Education: </label>
		<input type="checkbox" name="education[]"  value="B.Tech">B.Tech
		<input type="checkbox" name="education[]"  value="MCA">MCA
		<input type="checkbox" name="education[]"  value="Others">Others
	</div>
	<div name="Address">
		<label>Address: </label>
		<textarea id="address" name="address"></textarea>
	</div>
	<div name="profilepicture">
		<label>Profile Picture: </label>
		<input type="file" name="profile_picture" id="profile_picture">
	</div>
	<div name="submit">
		<input type="submit" name="submit" value="Register">
	</div>
<?php echo form_close();?>
</body>

<script src="<?php echo ASSETS_URL.'js/register.js';?>"></script>

</html>









