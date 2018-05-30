<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo ASSETS_URL.'js/cbFamily.js'?>"></script>
</head>
<body>
  <!-- <section>
  <h3><label class="parent"><input type="checkbox" /> Super Parent</label></h3>
</section>
<section>
  <h3><label class="parent"><input type="checkbox" /> Parent 1</label></h3>
  <div class="children">
    <h3><label class="parent"><input type="checkbox" /> Child 1-1</label> &nbsp; &nbsp;</h3>
        <div class="children">
            <label>&nbsp; &nbsp;<input type="checkbox" /> Child 1-1-1</label> &nbsp; &nbsp;
        </div>
    <label><input type="checkbox" /> Child 1-2</label> &nbsp; &nbsp;
    <label><input type="checkbox" /> Child 1-3</label>
  </div>
</section>
<section>
  <h3><label><input type="checkbox" /> Parent 2</label></h3>
  <div class="children">
    <label><input type="checkbox" checked="checked" /> Child 2-1</label> &nbsp; &nbsp;
    <label><input type="checkbox" checked="checked" /> Child 2-2</label> &nbsp; &nbsp;
    <label><input type="checkbox" checked="checked" /> Child 2-3</label>
  </div>
</section>
<section>
  <h3><label><input type="checkbox" /> Parent 3</label></h3>
  <div class="children">
    <label><input type="checkbox" checked="checked" /> Child 2-1</label> &nbsp; &nbsp;
    <label><input type="checkbox" checked="checked" /> Child 2-2</label> &nbsp; &nbsp;
    <label><input type="checkbox" checked="checked" /> Child 2-3</label>
  </div>
</section> -->
<?php
echo form_open_multipart('checkbox', '');
?>
<div class="super-parent">
  <ul>
    <li>
        <input type="checkbox" class="checkbox-type parent_chk" name="level-1">Level 1</input>
        <ul>
            <li>
                <input type="checkbox" class="checkbox-type parent_chk" name="level-2">Level 2</input>
                <ul>
                    <li>
                      <input type="checkbox" class="checkbox-type parent_chk" name="level-3">Level 3</input>
                        <ul>
                          <li><input type="checkbox" class="checkbox-type" name="level-3.1">Level 3.1</input></li>
                        </ul>
                    </li>
                    <li><input type="checkbox" class="checkbox-type" name="level-3.1">Level 3.1</input></li>
                    <li><input type="checkbox" class="checkbox-type" name="level-3.2">Level 3.2</input></li>
                    <li><input type="checkbox" class="checkbox-type" name="level-3.3">Level 3.3</input></li>                    
                </ul>
            </li>
        </ul>
    </li>
  </ul>
  <input type="submit" name="submit" id="submit" value="submit">
</div>
<?php
echo form_close();
?>
</body>
<script type="text/javascript">
  // $("h3 input:checkbox").cbFamily(function (){
  //   return $(this).parents("h3").next().find("input:checkbox");
  // });
  
  $(document).on('click', ".super-parent-checkbox", function () {

        if ($(".super-parent-checkbox").prop('checked') == true) {
            $('.check').prop('checked', true);
        } else
        {
            $('.check').prop('checked', false);
        }
    });

    $(document).on('click', ".parent_chk", function () {
       $('input[type=checkbox]', $(this).parent('li')).attr('checked', ($(this).is(':checked')));
    });

  //   $( "#submit" ).click(function() {
  //     if(confirm("Are you sure, you want to uncheck? "))
  //     {
  //       var url = "<?php echo base_url() . 'delete-profile-picture'; ?>";
  //       var arr = $('.checkbox-type').map(function () {
  //               return this.value;
  //           }).get();
  //       alert(arr);
  //       //var id = $('#id').val();
  //       // $.ajax({
  //       //   url: url,
  //       //   type: 'post',
          
  //       //   data: {image_name: image_name, id: id},
  //       //   success: function (data) {
  //       //           if(data == 1){
  //       //             $('#profilepicture_display').hide();
  //       //           }
  //       //       },
  //       //       error: function (data) {
  //       //       }
  //       // });
        
  //     }
  // });
  
</script>
</html>
<!-- Logiv:

If All Child nodes are selected then select next ancestor parent
http://jsfiddle.net/Py4UN/98/
If Parent is selected then select all child Node elements. -->