<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
</head>
<body>
<a href="<?php echo base_url(); ?>">Logout </a>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($users)){
            	foreach ($users as $u) {?>
            		<tr>
            			<td><?php echo $u->fullname; ?></td>
            			<td><?php echo $u->email; ?></td>
            			<td><?php echo ($u->gender==1)?'Male':'Female'; ?></td>
            			<td><?php $edit_user = 'edit-user'.'/'.$u->id;?><a href="<?php echo $edit_user; ?>">Edit</a> | <a href="javascript:void(0);">Delete</a></td>
            		</tr>
            	<?php }
            }
            ?>
        </tbody>
</table>
</body>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
	});
</script>
</html>