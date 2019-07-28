<?php
/*
Plugin Name: Order Trcking
*Author: Gopal Dasbairagya
*Iglobal Impact Ites Pvt.Ltd.
*Plugin URI: http://www.goigi.com
*Description: A highly documented plugin that demonstrates how to manage orders using official WordPress APIs.
*Version: 1.8.28
*Author URI: http://www.goigi.com
*/
function assets_init_method() {
//css
wp_register_style ('bootstrap', plugins_url ( 'master/css/bootstrap.min.css', __FILE__ ) );
wp_enqueue_style('bootstrap');
wp_register_style('font-awesome', plugins_url ( 'master/css/font-awesome.min.css', __FILE__ ));
wp_enqueue_style('font-awesome');
wp_register_style ('ionicons', plugins_url ( 'master/css/ionicons.min.css', __FILE__ ) );
wp_enqueue_style('ionicons');
wp_register_style ('morris', plugins_url ( 'master/css/morris/morris.css', __FILE__ ) );
wp_enqueue_style('morris');
wp_register_style ('jvectormap', plugins_url ( 'master/css/jvectormap/jquery-jvectormap-1.2.2.css', __FILE__ ) );
wp_enqueue_style('jvectormap');
wp_register_style ('fullcalendar', plugins_url ( 'master/css/fullcalendar/fullcalendar.css', __FILE__ ) );
wp_enqueue_style('fullcalendar');
wp_register_style ('daterangepicker', plugins_url ( 'master/css/daterangepicker-bs3.css', __FILE__ ) );
wp_enqueue_style('daterangepicker');
wp_register_style ('wysihtml5', plugins_url ( 'master/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css', __FILE__ ) );
wp_enqueue_style('wysihtml5');
wp_register_style ('dataTables', plugins_url ( 'master/css/datatables/dataTables.bootstrap.css', __FILE__ ) );
wp_enqueue_style('dataTables');
wp_register_style ('jquery-ui', plugins_url ( 'master/css/jquery-ui.css', __FILE__ ) );
wp_enqueue_style('jquery-ui');
wp_register_style ('animate', plugins_url ( '/css/animate.css', __FILE__ ) );
wp_enqueue_style('animate');
wp_register_style ('my-style', plugins_url ( 'css/style.css', __FILE__ ) );
wp_enqueue_style('my-style');

//js
wp_register_script('jquery', plugins_url ( 'master/js/jquery.min.js', __FILE__ ));
wp_enqueue_script('jquery'); 
wp_register_script('jquery-ui-1', plugins_url ( 'master/js/jquery-ui-1.10.3.min.js', __FILE__ ));
wp_enqueue_script('jquery-ui-1'); 
wp_register_script('bootstrap-js', plugins_url ( 'master/js/bootstrap.min.js', __FILE__ ));
wp_enqueue_script('bootstrap-js'); 
wp_register_script('morris-js', plugins_url ( 'master/js/plugins/morris/morris.min.js', __FILE__ ));
wp_enqueue_script('morris-js'); 
wp_register_script('sparkline', plugins_url ( 'master/js/plugins/sparkline/jquery.sparkline.min.js', __FILE__ ));
wp_enqueue_script('sparkline'); 
// wp_register_script('jvectormap-js', plugins_url ( 'master/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js', __FILE__ ));
// wp_enqueue_script('jvectormap-js'); 
// wp_register_script('jquery-jvectormap-world-mill-en', plugins_url ( 'master/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js', __FILE__ ));
// wp_enqueue_script('jquery-jvectormap-world-mill-en'); 
wp_register_script('fullcalendar-js', plugins_url ( 'master/js/plugins/fullcalendar/fullcalendar.min.js', __FILE__ ));
wp_enqueue_script('fullcalendar-js'); 
wp_register_script('jqueryKnob', plugins_url ( 'master/js/plugins/jqueryKnob/jquery.knob.js', __FILE__ ));
wp_enqueue_script('jqueryKnob');
wp_register_script('daterangepicker-js', plugins_url ( 'master/js/plugins/daterangepicker/daterangepicker.js', __FILE__ ));
wp_enqueue_script('daterangepicker-js'); 
wp_register_script('bootstrap-wysihtml5', plugins_url ( 'master/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js', __FILE__ ));
wp_enqueue_script('bootstrap-wysihtml5'); 
wp_register_script('iCheck', plugins_url ( 'master/js/plugins/iCheck/icheck.min.js', __FILE__ ));
wp_enqueue_script('iCheck');
// wp_register_script('app', plugins_url ( 'master/js/AdminLTE/app.js', __FILE__ ));
// wp_enqueue_script('app'); 
// wp_register_script('ckeditor-js', plugins_url ( 'master/js/plugins/ckeditor/ckeditor.js', __FILE__ ));
// wp_enqueue_script('ckeditor-js'); 

}
function custom_vendor_func(){
   $current_user   = wp_get_current_user();
    $role_name      = $current_user->roles[0];
    switch($role_name) {
        case client:
            return 'custom_client';
            break;
        case vendora:
            return 'custom_vendorA';
            break;
        case vendorb:
            return 'custom_vendorB';
            break;
        case Subscriber:
            return 'read';
            break;
        case Administrator:
            return 'manage_option';
            break;
        case Editor:
            return 'edit_pages';
            break; 
        case Contributor:
            return 'edit_posts';
            break;
        default:
            return 'read';
    }

}
add_action('admin_menu', 'wp_order_track');
function wp_order_track(){

    // add_menu_page('page_title','menu_title','capability','menu-slug','callback function','icon','position');

  $my_page = add_menu_page(__('My Order', 'menu-member'), __('My Order', 'menu-member'), custom_vendor_func(), 'my-order', 'My_Order',plugin_dir_url( __FILE__ ) . 'images/tracking.png');
   $my_page1 = add_submenu_page('my-order', 'Add New Order', 'Add New Order', custom_vendor_func(),'add-new-order','add_new_order'); 
   $my_page2 = add_submenu_page('my-order', 'User Compatibility', 'User Compatibility', 'manage_options','user-compatibility','user_compatibility');
   $my_page3 = add_submenu_page(null, 'Order Confirm', 'Order Confirm', custom_vendor_func(),'order-confirm','order_confirm');
   $my_page4 = add_submenu_page(null,'Order Details', 'Order Details', custom_vendor_func(),'order-details','order_details');/**here first param null is to hide the page from admin panel*********/
    add_action( "admin_print_scripts-$my_page", 'assets_init_method' );
    add_action( "admin_print_scripts-$my_page1", 'assets_init_method' );
    add_action( "admin_print_scripts-$my_page2", 'assets_init_method' );
    add_action( "admin_print_scripts-$my_page3", 'assets_init_method' );
    add_action( "admin_print_scripts-$my_page4", 'assets_init_method' );
}

 // =========================================new order============================
function My_Order(){
if(isset($_POST['order_submit'])){
  require_once('data-save.php'); /******processing the order-conirmation form*******/
}

require_once('about-author.php');?>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->

<div class="wrapper row-offcanvas row-offcanvas-left"> 
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side1"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="dashboard.html"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order List</li>
      </ol>
    </section>
    <!-- Main content -->
<?php require_once('order-list.php');?>
    <!-- /.content -->
    <footer> </footer>
  </aside>
  <!-- /.right-side --> 
</div>

<script type="text/javascript">
function selectAllChk() 
    {
        var formObj=document.form4;
        if(formObj.chkSelectAll.checked)
            {
                checked=true;
            }
            else
            {
                checked=false;
            }
            for (var i=0;i < formObj.length;i++) 
                {
                    fldObj = formObj.elements[i];
                    if (fldObj.type == 'checkbox')
                {
                fldObj.checked = checked;
            
                }   
            }
    }
function deleteRecord() 
    {
    formObj=document.form4;
    var flag=0;
    for (var i=0;i < formObj.length;i++)
    {
    fldObj = formObj.elements[i];
    if (fldObj.type == 'checkbox')
    {
    if(fldObj.checked)
    {
    flag=1;
    }
    }
    }
    if(flag==0)
    {
    alert("Please select at least one item to delete");
    }
    else if(confirm("Are your sure want to delete selected items?"))
            {
            //formObj.submit();
            document.getElementById("action").value='Delete';
            var formobj=document.form4;
            formobj.action="order-list.php?page=ukcl&PageNo=&search=&action=Delete";
            formobj.submit();
            }
        }
function activeRecord() 
    {
    formObj=document.form4;
    var flag=0;
    for (var i=0;i < formObj.length;i++)
    {
    fldObj = formObj.elements[i];
    if (fldObj.type == 'checkbox')
    {
    if(fldObj.checked)
    {
    flag=1;
    }
    }
    }
    if(flag==0)
    {
    alert("Please select at least one item for active mode");
    }
    else if(confirm("Are you sure you want to change as active mode?"))
    {
    //formObj.submit();
    document.getElementById("action").value='Active';
        var formobj=document.form4;
        formobj.action="order-list.php?page=ukcl&PageNo=&search=&action=Active";
        formobj.submit();
        }
    }
function inactiveRecord() 
    {
    formObj=document.form4;
        var flag=0;
        for (var i=0;i < formObj.length;i++)
        {
        fldObj = formObj.elements[i];
        if (fldObj.type == 'checkbox')
        {
        if(fldObj.checked)
        {
            flag=1;
        }
        }
        }
        if(flag==0)
        {
        alert("Please select at least one item for inactive mode");
        }
        else if(confirm("Are you sure you want to change?"))
        {
        //formObj.submit();
        document.getElementById("action").value='Inactive';
        var formobj=document.form4;
        formobj.action="order-list.php?page=ukcl&PageNo=&search=&action=Inactive";
        formobj.submit();
        }
        }
function payactiveRecord() 
    {
    formObj=document.form4;
    var flag=0;
    for (var i=0;i < formObj.length;i++)
    {
    fldObj = formObj.elements[i];
    if (fldObj.type == 'checkbox')
    {
    if(fldObj.checked)
    {
    flag=1;
    }
    }
    }
    if(flag==0)
    {
    alert("Please select at least one item for active mode");
    }
    else if(formObj.totaldays.value=="")
    {
    alert("Please insert the total days.!");
    document.getElementById("totaldays").focus();
    return false;
    }
    else if(isNaN(formObj.totaldays.value))
    {
    alert("Total Days should be numeric value.!");
    document.getElementById("totaldays").focus();
    return false;
    }
    else if(confirm("Are you sure you want to change as active mode?"))
    {
    //formObj.submit();
    document.getElementById("action").value='Activepay';
    var formobj=document.form4;
    formobj.action="order-list.php?page=ukcl&PageNo=&search=&action=Activepay";
    formobj.submit();
    }
}
function payinactiveRecord() 
    {
    formObj=document.form4;
    var flag=0;
    for (var i=0;i < formObj.length;i++)
    {
    fldObj = formObj.elements[i];
    if (fldObj.type == 'checkbox')
    {
    if(fldObj.checked)
    {
    flag=1;
    }
    }
    }
    if(flag==0)
    {
    alert("Please select at least one item for inactive mode");
    }   
    else if(confirm("Are you sure you want to change?"))
    {
    //formObj.submit();
    document.getElementById("action").value='Inactivepay';
    var formobj=document.form4;
    formobj.action="order-list.php?page=ukcl&PageNo=&search=&action=Inactivepay";
    formobj.submit();
    }
    }
    
function SearchRecord() 
    {
    document.getElementById("action").value='search';
        var formobj=document.form4;
        formobj.action="order-list.php?page=ukcl&PageNo=&search=&action=search";
        formobj.submit();
    }
</script>

 <?php } 

 // =========================================new order============================
 function add_new_order(){ 
?>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<div class="wrapper row-offcanvas row-offcanvas-left"> 
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side1"> 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>ORDER FORM <small>SERENITEA ADD NEW ORDER</small> </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href=""><i class="fa fa-pagelines"></i> Content List </a></li>
        <li class="active"></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <form role="form" name="rwsglobalform"  id="rwsglobalform" action="<?php echo admin_url();?>admin.php?page=order-confirm" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-12"> </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary"> 
              <!-- add multiple tabs of the form -->

              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <?php require_once('dynamic-tab.php');?>
                </ul>
                <input type="hidden" name="user_id" value="<?php echo $currnet_user_id;?>">
                <div class="tab-content">
                  <!-- =========================tab1==================== -->
                  <?php require_once('tab1-html.php');?>
                  <!-- =========================tab2==================== -->
                  <?php require_once('tab2-html.php');?>
                  <!-- =========================tab3==================== -->
                  <?php require_once('tab3-html.php');?>
                  <!-- =========================tab4==================== -->
                  <?php require_once('tab4-html.php');?>
                  <!-- =========================tab5==================== -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="box box-warning btcol" id="btc">
              <div class="box-footer" style="text-align:center">
                <!-- <button class="btn btn-primary" type="submit" name="rws-submit">Next >></button> -->
                <input class="btn btn-primary" id="next" type="submit" name="submit" value="Proceed">
                &nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div>
          </div>
        </div>
        <!-- <?php require_once('instruction.php');?> -->
      </form>
    </section>
    <!-- /.content -->
   <!--  <footer> </footer> -->
  </aside>
  <!-- /.right-side --> 
</div>
</body>

<script type="text/javascript">
$(function() {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('rwscontenteditor');
//bootstrap WYSIHTML5 - text editor
CKEDITOR.replace('other_facilities');
//bootstrap WYSIHTML5 - text editor
CKEDITOR.replace('cusines');
//bootstrap WYSIHTML5 - text editor
});


    function changeColor(id) {
        var tabs = document.getElementsByClassName('tab');
        var btc = document.getElementById('btc');
         if(id=='tab1' || id=='tab2'){
              btc.style.borderTopColor = "#f39c12";
              document.getElementById("next").style.background ="#b08b2d";
              document.getElementById("next").style.borderColor ="#b08b2d";
        }
        else{
             btc.style.borderTopColor = "#376091";
            document.getElementById("next").style.background ="#376091";
            document.getElementById("next").style.borderColor ="#376091";
        }
       
    }

</script>
 <?php } 
 //--------------------------------SET PERMISSION FOR DIFFERENT USERS----------------------
 function user_compatibility(){ 
 $x = plugin_dir_url( __FILE__ ).'server-file/connect.php';
?>

    <section class="content">
        <div id="msg-success"></div>
      <div class="row">
        <div class="col-xs-12"><!-- /.box -->
          <!-- <form method="get" name="form4" id="form4"> -->
            <div class="box"><!-- /.box-header -->
              <div class="box-body table-responsive">
              <h1> Add Compatibility to the users! </h1>
                <div class="rws-messageshow">14   results found!</div>
                <div class="row" style="padding-bottom:10px; padding-top:5px;">
                  <div class="col-xs-6">
                    <button class="btn btn-primary" type="button" name="rws-addbtn" onclick="document.location.href='<?php echo admin_url();?>/user-new.php'"> Add User </button>
                    &nbsp; </div>
                  <div class="col-xs-6" ></div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <!-- <th width="10"><input name="chkSelectAll" type="checkbox" id="chkSelectAll" value="checkbox" onclick="javascript:selectAllChk();" /></th>  -->
                     <th>ID</th>
                      <th><a href="" title="Click to Sort in desending order.">Username</a></th>
                      <th><a href="" title="Click to Sort in desending order.">SereniTEA Retail</a></th>
                      <th><a href="" title="Click to Sort in desending order.">SereniTEA Foodservice</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Zoetic Retail</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Zoetic Foodservice</a></th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                 
                  $i=1;
                  $j=1;
                  $blogusers = get_users( array( 'fields' => array( 'display_name','id' ) ) );
                    function che($user_id,$form_name){
                       global $wpdb;
                      $results = array();
            $q = "SELECT * FROM permission WHERE user_id =".$user_id." AND form_name='".$form_name."'";
                    $results = $wpdb->get_results($q);
                    if($results){
                      echo 'checked';
                      }
                    }
                     che('101014',"SereniTEA Retail");
                  foreach ( $blogusers as $user ) {
                    $user_id = $user->id;

                      ?>

                        <tr id=row<?php echo $i;?>>
                          <td><?php echo $i;?></td>
                          <td><?php echo esc_html( $user->display_name );?></td>
                          <td><input value="SereniTEA Retail" name="per_<?php echo $user_id;?>" type="checkbox" <?php che($user_id,"SereniTEA Retail");?>/></td>
                          <td><input value="SereniTEA Foodservice" name="per_<?php echo $user_id;?>" type="checkbox" <?php che($user_id,"SereniTEA Foodservice");?>/></td>
                          <td ><input value="Zoetic Retail" name="per_<?php echo $user_id;?>" type="checkbox" <?php che($user_id,"Zoetic Retail");?>/></td>
                          <td ><input value="Zoetic Foodservice" name="per_<?php echo $user_id;?>" type="checkbox" <?php che($user_id,"Zoetic Foodservice");?>/></td>                        
                         <td>
                         <input type="button" onclick="SetPermission('<?php echo $user_id;?>')" value="Set Permission"  />
                         </td>
                        </tr>


                    <?php  $i++; $j++; } ?>
                  
                  </tbody>
                  <tfoot>
                      <tr>
                      <th width="10">#</th>
                      <th><a href="" title="Click to Sort in desending order.">Username</a></th>
                      <th><a href="" title="Click to Sort in desending order.">SereniTEA Retail</a></th>
                      <th><a href="" title="Click to Sort in desending order.">SereniTEA Foodservice</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Zoetic Retail</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Zoetic Foodservice</a></th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
                <div class="row"  style="padding-top:10px; padding-bottom:10px;">
                  <div class="col-xs-6">
                    <div class="dataTables_info" id="example1_info"> Showing  1 to 20 of 14 entries </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="dataTables_paginate paging_bootstrap">
                      <ul class="pagination">
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- /.Pagination Ends --> 
              </div>
              <!-- /.box-body --> 
            </div>
            <!-- /.box -->
          <!-- </form> -->
        </div>
      </div>
    </section>
    <script type="text/javascript">
    function SetPermission(id)
    {
      var permissions='';
      jQuery('input:checkbox[name=per_' + id+ ']').each(function () {
            if (jQuery(this).is(':checked')) {
                if(permissions=='')
                {
                permissions=jQuery(this).val();
                }
                else
                {
                  permissions = permissions + ',' + jQuery(this).val();
                }
                
            }
        });
      SavePermission(id,permissions);
    }
var save_lnk = "<?php echo plugin_dir_url( __FILE__ ).'server-file/save.php';?>";
    function SavePermission(id,perm)
    {
      console.log(id);
             if(id!=null && perm!=null && id!='' && perm!=''){
             // if(id!=null){

                jQuery.ajax({
                    type:'post',
                    url:save_lnk,
                    data:{
                        user_id:id,
                        permsn:perm
                    },
                    success:function(data) {
                      document.getElementById("msg-success").innerHTML = data;
                      jQuery('#msg-success').show();
                      setTimeout(function() {
                        jQuery('#msg-success').fadeOut('fast');
                      }, 5000);
                     
                      
                    }
                });

            }
    }


    </script>

<?php } 
function order_confirm(){ 
global $wpdb;
if(isset($_POST['submit'])){ 
  require_once('data-proccess.php');?>
    <form role="form" name="rwsglobalform"  id="rwsglobalform" action="<?php echo admin_url();?>admin.php?page=my-order" method="post" enctype="multipart/form-data">
    <div class="content">
    <div class="row">
          <div class="col-md-12">
            <div class="box box-primary"> 
              <!-- add multiple tabs of the form -->
       <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                <?php  require_once('dynamic-tab.php');?>
                </ul>
            <div class="tab-content">
                <?php  require_once('confirm-tab1.php');?>
                <?php  require_once('confirm-tab2.php');?>
                <?php  require_once('confirm-tab3.php');?>
                <?php  require_once('confirm-tab4.php');?>
            </div><!--end tab-content-->
                <div class="row">
                <div class="col-md-12">
                  <div class="box box-warning" id="btc1">
                    <div class="box-footer" style="text-align:center">
                      <a href="<?php echo admin_url();?>admin.php?page=add-new-order" class="btn btn-primary" id="back" type="submit" name="rws-submit">Back</a>
                      <input class="btn btn-primary" id ="order" type="submit" name="order_submit" value="Order Now">
                      &nbsp;&nbsp;&nbsp;&nbsp;</div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div><!--end row-->
  </div><!--end content-->
  </form>
  
  <script>
     function changeColor(id) {
        var tabs = document.getElementsByClassName('tab');
        var btc = document.getElementById('btc1');
         if(id=='tab1' || id=='tab2'){
              btc.style.borderTopColor = "#f39c12";
              document.getElementById("order").style.background ="#b08b2d";
              document.getElementById("order").style.borderColor ="#b08b2d";
              document.getElementById("back").style.background ="#b08b2d";
              document.getElementById("back").style.borderColor ="#b08b2d";
        }
        else{
             btc.style.borderTopColor = "#376091";
            document.getElementById("order").style.background ="#376091";
            document.getElementById("order").style.borderColor ="#376091";
             document.getElementById("back").style.background ="#376091";
              document.getElementById("back").style.borderColor ="#376091";
        }
       
    }</script>
   <?php  } //end if($_post['submit'])
 } //end function order_confirm()

function order_details(){
require_once('view-order.php');
 }