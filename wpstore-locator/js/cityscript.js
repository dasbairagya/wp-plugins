
    // <script type="text/javascript">
 
    JQuery(document).ready(function(){
    JQuery("#btn_submit").click(function(){
    var city = $("#city").val();
    var status = $("#status").val();
  
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'city='+ city + '&status='+ status;
    if(city==''|| status=='')
    {
    alert("Please Fill All Fields");
    }
    else
    {
      $('#loader1').show(); //call loader to be show
    // AJAX Code To Submit Form.
    $.ajax({
    type: "POST",
    url: "<?php echo site_url();?>/insert/",
    data: dataString,
    cache: false,
    success: function(result){
   $('#msg1').html(result); //show the success message from the process.php and overwrite the html inside the <p> tag.
    $('#loader1').hide(); // hide the loader
       // document.forms['contact_form'].reset(); //reset the form after submitting.
    }
    });
    }
    return false;
    });
    });
    // </script>




// <script>
            function delete_row(id) {
            var lnk = "<?php echo site_url();?>/delete";
            if(confirm("Are you sure you want to delete this Record?")){
                $.ajax
                ({
                    type:'post',
                    url:lnk,
                    data:{
                        delete_row:'delete_row',
                        row_id:id
                    },
                    success:function(data) {
                            $("#row" + id).remove();
                    }
                });
            }
        }
    // </script>