<?php
/*
Plugin Name: City Manager
Plugin URI: http://goigi.com/
Description: This is not just a plugin, its a inspiration for plugin development.
Author: Gopal Dasbairagya
Version: 1.0
Author URI: http://goigi.com/
*/


 //registering javascript and css
function my_init_method() {
 wp_register_style ( 'mysample1', plugins_url ( 'css/boot.min.css', __FILE__ ) );
  wp_register_style ( 'mysample', plugins_url ( 'css/style.css', __FILE__ ) );
  // wp_register_style( 'mysample1', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"', array (), '1.0.0', true); 
   wp_register_script( 'mysample2', plugins_url ( 'js/boot.min.js', __FILE__ ) );
  // wp_register_script( 'mysample3', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js', array (), '1.0.0', true);
wp_register_script( 'mysample3', plugins_url ( 'js/select.min.js', __FILE__ ));
  wp_register_script( 'mysample4', plugins_url ( 'js/jquery.min.js', __FILE__ ));
   // wp_register_script ( 'mysample', plugins_url ( 'js/cityscript.js', __FILE__ ) );
 
 wp_enqueue_style('mysample');
 wp_enqueue_style('mysample1');
 wp_enqueue_script('mysample2');
 wp_enqueue_script('mysample3');
 wp_enqueue_script('mysample4');
 // wp_enqueue_script('mysample');
    
}
add_action('init', 'my_init_method');




add_action('admin_menu', 'wp_add_city');
function wp_add_city(){
    add_menu_page(__('Manage City', 'menu-city'), __('Manage City', 'menu-city'), 'manage_options', 'add-city', 'add_city',plugin_dir_url( __FILE__ ) . 'images/city.png');

}

function add_city() { ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  <style>
      

</style>
</head>
<body>

<div class="container">
  <h1>City Manager</h1>
  <p>You Can Add, Update and Delete city with "City Manager"</p>
  <ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home">Home</a></li>
    <li><a data-toggle="pill" href="#menu1">Add City</a></li>
    <li><a data-toggle="pill" href="#menu2">All Cities</a></li>
    <!-- <li><a data-toggle="pill" href="#menu3">Menu 3</a></li> -->
  </ul>
  


<center>

<div class="tab-content">
       <div id="home" class="tab-pane fade in active">
         <h3></h3>
         <h2>You Can Add, Update and Delete city with "City Manager"</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et libero consequat, consequat mi non, euismod augue. Sed elementum fringilla risus a condimentum. Quisque scelerisque sit amet urna eu ultrices. Sed in semper orci. Integer a consectetur tortor. Suspendisse vel nunc dignissim, rutrum dolor in, fringilla turpis. Nulla euismod ex tellus, eget ornare orci condimentum a. Praesent ex lorem, ullamcorper a felis vel, tincidunt sodales mauris. </p>
       </div>
       <!-- tab1 -->

       <div id="menu1" class="tab-pane fade">
         <h2>Add City</h2>
         <p>Add city name to show the home home page</p>

            <div id="list1" class="myplug" style="width:400px;height:400px;padding:10px;border:10px groove #cd9632;">
            <div class="loading" id="loder1" style="display: none;">Loading&#8230;</div> 
                <form action="" method="post">
                    <h3><?php _e( 'Put City To Add:' ); ?></h3>
                    <input type="text" id="city" name="city" required="required" placeholder="Add a city name"><br/><br/>
                    <h3><?php _e( 'Post Status:' ); ?></h3><br>
                    <select id="status" name="status" required="required">
                        <option value="">select</option>
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                    <input id="btn_submit" type="submit" name="submit">
                </form>
                <p id="msg1"></p> 
               
              </div>
        </div>


<!-- tab2 -->
        <div id="menu2" class="tab-pane fade">
                   <h2>All Cities</h2>
                   <p>List all the cities that have been already added</p>
                   <div id="list2" class="myplug" style="width:400px;height:100%;padding:10px;border:10px groove #cd9632;">
                
                     <h3><?php _e( 'All Cities:' ); ?></h3><br>
                     <table>
                     <tr>
                      <th style="font-weight: bold;">Sl No.</th>
                       <th>City</th>
                       <th>Status</th>
                       <th>Action</th>
                     </tr>
                       <?php global $wpdb;  
                       $results = $wpdb->get_results( "SELECT * FROM city" ); 
                             foreach ($results as $result) { 
                            
                              ?> 
                         <tr id="row<?php echo $result->id;?>">
                         <td><?php echo $result->id;?></td>
                         <td><?php echo $result->city; ?></td>
                         <td><?php echo $result->status;?></td>
                         <td><a data-toggle="pill" href="#mymenu<?php echo $result->id;?>" id="city<?php echo $result->id;?>">Edit</a>/<a href="#" id="delete_button<?php echo $result->id;?>" onclick="delete_row('<?php echo $result->id;?>');">Delete</a></td>
                         
                       </tr>

               <?php  } ?> 
                     
                  </table>
             </div>

        </div>






<?php global $wpdb;  
 $results = $wpdb->get_results( "SELECT * FROM city" );
foreach ($results as $result) {?>
<!-- create dynamic tab for each row -->
  <!-- tab x -->

         <div id="mymenu<?php echo $result->id;?>" class="tab-pane fade">
         <h2>Edit City</h2>
         <p>Edit city name to show the home home page</p>

            <div id="list3" class="myplug" style="width:400px;height:400px;padding:10px;border:10px groove #cd9632;">
            <div class="loading" id="loder" style="display: none;">Loading&#8230;</div>
               <form action="" method="post"> 
                    <h3><?php _e( 'Update City:' ); ?></h3>
                    <?php
                    $id = $result->id;
                  


                     $rows= $wpdb->get_results("SELECT * FROM city where id=$id");
                    foreach ($rows as $row) {?>

                    <input type="text" id="city1_<?php echo $row->id;?>" name="city1" value="<?php echo $row->city;?>"><br/><br/>
                    <?php } ?>
                    <h3><?php _e( 'Post Status:' ); ?></h3><br>
                    <select  id="status1_<?php echo $row->id;?>" name="status1" required="required">
                        <option value="">select</option>
                        <option value="draft">Draft</option>
                        <option value="publish">Publish</option>
                    </select>
                    <input type="hidden" id="cityId_<?php echo $row->id;?>" name="city_id" value="<?php echo $id;?>">
                    <input type="submit" id="up<?php echo $row->id;?>" value="Update" name="update">
                </form>
                <p id="msg1_<?php echo $row->id;?>"></p> 
                   
              </div>
        </div>
        <!-- end tabx -->
        <!-- script for update -->

    <script type="text/javascript">
 
    $(document).ready(function(){
    $("#up<?php echo $row->id;?>").click(function(){
      
    var cityup = $("#city1_"+<?php echo $row->id;?>).val();
    var statusup = $("#status1_"+<?php echo $row->id;?>).val();
    var cityID = $("#cityId_"+<?php echo $row->id;?>).val();
  
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'city1='+ cityup + '&status1='+ statusup +'&cityId='+ cityID;
   
    if(cityup==''|| statusup=='')
    {
    alert("Please Fill All Fields");
    }
    else
    {
      $('#loader').show(); //call loader to be show
    // AJAX Code To Submit Form.
    $.ajax({
    type: "POST",
    url: "<?php echo site_url();?>/update/",
    data: dataString,
    cache: false,
    success: function(result){
   $("#msg1_"+<?php echo $row->id;?>).html(result); //show the success message from the process.php and overwrite the html inside the <p> tag.
    $('#loader').hide(); // hide the loader
       // document.forms['contact_form'].reset(); //reset the form after submitting.
    }
    });
    }
    return false;
    });
    });
    </script>
   

  
<?php } ?>



     <script type="text/javascript">
 
    $(document).ready(function(){
    $("#btn_submit").click(function(){
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
     </script>




 <script>
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
   </script>


  </div>
  </center>

  </div>

  </body>
</html>



<?php } ?>