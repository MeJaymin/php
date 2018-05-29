<!DOCTYPE html>
<html>
<head>
	<title>Category Tree</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- Reference Links:https://www.jqueryscript.net/demo/Dynamic-Tree-View-Plugin-With-Checkbox-Support-jQuery-Treejs/#html -->
<?php echo $categories; ?>
</body>
<script type="text/javascript">
	$(".check").click(function () {

        if ($('.check').not(':checked').length > 0) {
            $("#check_all").prop('checked', false)
        } else {
            $("#check_all").prop('checked', true)
        }
    });
</script>
</html>