<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<?php
	if($this->uri->segment(1) == "add-user")
	{
	    $title="Add User Details";
	    $style="";
	    $redirect="add-user";   
	}
	if($this->uri->segment(1) == "edit-user")
	{
	    $title="Edit User Details";
	    $style="";
	    $redirect="edit-user";
	}
	?>
	<title></title>
</head>
<body>
<?php
$if_selected=$else_selected=$fullname=$email=$gender=$profile_picture=$address=$education=$status=$id="";
if(!empty($editusers)){
	$id = $editusers[0]->id;
	$fullname = $editusers[0]->fullname;
	$email = $editusers[0]->email;
	$gender = $editusers[0]->gender;
	$profile_picture = $editusers[0]->profile_picture;
	$status = $editusers[0]->status;
	$address = $editusers[0]->address;
	$education = $editusers[0]->education;
	$education_array = explode(",",$education);
}


$attributes = array('name' => 'register', 'id' => 'register');
echo form_open_multipart($redirect.'/'.$id, $attributes);
?>
	<div name="fullname">
		<label>Full Name: </label>
		<input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>">
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	</div>
	<div name="email">
		<label>Email: </label>
		<input type="email" name="email" id="email" value="<?php echo $email; ?>" readonly>
	</div>
	<div>
		<label>Gender: </label>
		<input type="radio" name="gender" value="1" <?php echo ($gender==1)?'checked="checked"':''?>/>Male
		<input type="radio" name="gender" value="0" <?php echo ($gender==0)?'checked="checked"':''?> />Female
	</div>
	<div name="education">
		<label>Education: </label>
		<input type="checkbox" name="education[]"  value="B.Tech" <?php echo (in_array('B.Tech',$education_array))?"checked=checked":''?> />B.Tech
		<input type="checkbox" name="education[]"  value="MCA" <?php echo (in_array('MCA',$education_array))?"checked=checked":''?> />MCA
		<input type="checkbox" name="education[]"  value="Others" <?php echo (in_array('Others',$education_array))?"checked=checked":''?>/>Others
	</div>
	<div name="Address">
		<label>Address: </label>
		<textarea id="address" name="address"><?php echo $address; ?></textarea>
	</div>
	<div name="profilepicture">
		<label>Profile Picture: </label>
		<input type="file" name="profile_picture" id="profile_picture">
		<div id="profilepicture_display">
		<?php 
		if(!empty($profile_picture)){?>
			<img src="<?php echo ASSETS_URL.'uploads/'.$profile_picture ?>" height="100" width="100">
			<input type="hidden" name="exist_image_name" id="exist_image_name" value="<?php echo $profile_picture;?>">
			<a href="#" id="delete-image" class="delete-image">Delete</a>
		<?php }
		?>
		</div>
	</div>
	<div name="submit">
		<input type="submit" name="submit" value="Submit">
	</div>
<?php echo form_close();?>
</body>
<script type="text/javascript">
	$( "#delete-image" ).click(function() {
  		if(confirm("Are you sure, you want to delete the image? "))
    	{
    		var url = "<?php echo base_url() . 'delete-profile-picture'; ?>";
    		var image_name = $('#exist_image_name').val();
    		var id = $('#id').val();
    		$.ajax({
    			url: url,
    			type: 'post',
    			
    			data: {image_name: image_name, id: id},
    			success: function (data) {
                	if(data == 1){
                		$('#profilepicture_display').hide();
                	}
            	},
	            error: function (data) {
	            }
    		});
    		
    	}
	});
</script>
</html>