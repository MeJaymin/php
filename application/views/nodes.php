<!DOCTYPE html>
<html>
<head>
	<title>Nodes</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.css" />
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
</head>
<body>
	<div class="col-md-8" id="treeview_json">
     
	</div>
</body>
<script type="text/javascript">
$(document).ready(function(){
	var treeData;
	var url = "<?php echo base_url() . 'nodes-data'; ?>";
	$.ajax({
		type: "GET",  
		url: url,
		dataType: "json",       
		success: function(response)  
		{
			initTree(response)
		}   
	});
	function initTree(treeData) {
	$('#treeview_json').treeview({data: treeData});
	}
});
</script>
</html>