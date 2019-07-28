<?php 
global $wpdb;
$user_id = get_current_user_id();
$current_user   = wp_get_current_user();
$role_name      = $current_user->roles[0];
$limit = 6;  
if (isset($_GET["pid"])) { $pid  = $_GET["pid"]; } else { $pid=1; };  
$start_from = ($pid-1) * $limit; 
$sqli = "SELECT * FROM wp_users order by id ASC LIMIT $start_from, $limit";
//echo $sqli;
$results = $wpdb->get_results($sqli);
// echo '<pre>';
// print_r($results);
// echo '</pre>';
// die();
?>
<body class="skin-blue">
  <!-- header logo: style can be found in header.less -->
  <div class="wrapper row-offcanvas row-offcanvas-left"> 
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side1"> 
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="breadcrumb">
          <h1>
            <a>
              <i class="fa fa-dashboard active">
              </i> All Installer Panel
            </a>
          </h1>
        </div>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <!-- /.box -->
            <!-- <form action="" method="get" name="form4" id="form4"> -->
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <!-- <div class="rws-messageshow">14   results found!</div> -->
                <div class="row" style="padding-bottom:10px; padding-top:5px;">
                  <div class="col-xs-12">
                    <div id="trackbox" style="margin-top:50px;" class="mainbox" >   
                      <div class="panel panel-info" >
                        <div class="panel-heading">
                          <h4 class="panel-title">Job for 
                            <b>
                              <span id="installer-name">testing
                              </span>
                            </b>
                          </h4>
                          <span class="pull-right clickable" data-effect="slideUp">&times;
                          </span>
                        </div>     
                        <div style="padding-top:30px" class="panel-body" >
                          <div  id="tracking-alert" class="alert alert-danger col-sm-12">
                          </div>
                          <form id="loginform" class="form-horizontal" role="form" >
                            <div class="col-md-6">
                              <h4>Job Details
                              </h4>
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-user">
                                  </i>
                                </span>
                                <input id="job_title" type="text" class="form-control" name="job_title" value="" placeholder="Job Title" required="required">                                        
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-user">
                                  </i>
                                </span>
                                <textarea id="job_description" class="form-control" name="job_description" placeholder="Job Description" required="required" >
                                </textarea>                                      
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                <label for="exampleInputFile">Upload image
                                </label>
                                <input type="file" class="input-group" name="featured_img" id="featured_img" size="50" onchange="readURL(this);" >
                                <img id="blah" src="https://site.goigi.co/egates/wp-content/uploads/2018/05/No_Image_Available.jpg" style="width: 150px; height: 150px;" alt="your image" />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <h4>Customer Details
                              </h4>
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-user">
                                  </i>
                                </span>
                                <input id="customer_name" type="text" class="form-control" name="customer_name" value="" placeholder="Coustomer Name" required="required">                                        
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-user">
                                  </i>
                                </span>
                                <input id="customer_email" type="email" class="form-control" name="customer_email" value="" placeholder="Coustomer's Email" required="required">                                        
                              </div> 
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-user">
                                  </i>
                                </span>
                                <input id="customer_contact" type="text" class="form-control" name="customer_contact" value="" placeholder="Coustomer's Phone" required="required">                                        
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                  <i class="glyphicon glyphicon-user">
                                  </i>
                                </span>
                                <input id="customer_address" type="text" class="form-control" name="customer_address" value="" placeholder="Coustomer's Address" required="required">                                        
                              </div>
                              <input id="installer_name" type="hidden" class="form-control" name="installer_name" value="" placeholder="Courier Name" required="required">
                              <input id="installer_id" type="hidden" class="form-control" name="installer_id" placeholder="Tracking no">
                            </div>
                            <div style="margin-top:10px" class="form-group">
                              <!-- Button -->
                              <div class="col-sm-12 controls">
                                <a id="btn-tracking" href="#" class="btn btn-primary">Add
                                </a>
                                <?php 
echo '<img class="loader" id="loader-tracker" src="' . esc_url( plugins_url( '../img/ajax-loader.gif', __FILE__ ) ) . '" >'
?>
                              </div>
                            </div>
                          </form>     
                        </div>                     
                      </div>  
                      <script>
                        function readURL(input) {
                          if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                              $('#blah').show();
                              $('#blah')
                                .attr('src', e.target.result)
                                .width(150)
                                .height(150);
                            };
                            reader.readAsDataURL(input.files[0]);
                          }
                        }
                      </script>
                    </div>
                  </div>
                  <!--     <div class="col-xs-6" ></div> -->
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <!--  <th width="10"><input name="chkSelectAll" type="checkbox" id="chkSelectAll" value="checkbox" onclick="javascript:selectAllChk();" /></th> -->
                    <tr>
                      <th width="10">ID
                      </th>
                      <th>
                        <a href="" title="Click to Sort in desending order.">Name
                        </a>
                      </th>
                      <th>
                        <a href="" title="Click to Sort in desending order.">Email
                        </a>
                      </th>
                      <th>Action
                      </th>
                      <th>Status
                      </th>
                      <th>Assign Job
                      </th>
                    </tr>
                    </tr>
                  </thead>
                <tbody>
                  <?php $i =$start_from+1; foreach ($results as $result) {  
$status = ($result->user_status == 1) ? 'Active' : 'Inactive';
if($result->user_status == 0){
$option = 'Active';
$value = 1;
}
if($result->user_status == 1){
$option = 'Inactive';
$value = 0;
}
$color = ($result->user_status == 1) ? 'green' : 'red';
?>
                  <tr>
                    <td>
                      <?php echo $result->ID;?>
                    </td>
                    <td>
                      <?php echo $result->display_name;?>
                    </td>
                    <td>
                      <?php echo $result->user_email;?>
                    </td>
                    <td>
                      <a class="btn btn-primary btn-md" href="<?php echo admin_url();?>admin.php?page=user-details&user_id=<?php echo $result->ID;?>">
                        <i class="fa fa-eye">
                        </i> About Installer
                      </a> | 
                      <a class="btn btn-primary btn-md" href ="javascript:void(0);" onClick="DeleteUser(<?php echo $result->ID;?>)">
                        <i class="fa fa-trash-o">
                        </i> Delete Installer
                      </a> 
                    </td>
                    <td>
                      <form>
                        <select class="sts_width" id="sel<?php echo $i;?>" style="color:<?php echo $color;?>">
                          <option value="<?php echo $result->user_status;?>">
                            <?php echo $status;?>
                          </option>
                          <option value="<?php echo $value;?>">
                            <?php echo $option;?>
                          </option>
                        </select>
                        <?php 
echo '<img class="loader" id="loader'. $i. '" src="' . esc_url( plugins_url( '../img/ajax-loader.gif', __FILE__ ) ) . '" >'
?>
                      </form>
                    </td>
                    <td>
                      <button type="button" id="btn<?php echo $i;?>" class="btn btn-primary btn-md" style="text-align: center;">
                        <i class="fa fa-plus-square">
                        </i> Add  
                      </button>
                    </td>
                </td>
                </tr>
              <script type="text/javascript">
                jQuery("#sel<?php echo $i;?>").change(function(){
                  status = this.value;
                  user_id = '<?php echo $result->ID;?>';
                  user_email = '<?php echo $result->user_email;?>';
                  display_name = '<?php echo $result->display_name;?>';
                  if(this.value !=''){
                    jQuery('#loader<?php echo $i;?>').show();
                    var datas = 'status='+status+
                                '&user_id='+user_id+
                                '&user_name='+display_name+
                                '&user_email='+user_email;   
                    var url = '<?php echo  esc_url( plugins_url( 'status-update.php', __FILE__ ));?>';
                    jQuery.ajax({
                      type:'POST',
                      url: url,
                      data: datas,
                      catch: false,
                      success: function(response){
                        jQuery('#loader<?php echo $i;?>').hide();
                        alert(response);
                        location.reload();
                        // if(response=='Status has been changed successfully!'){
                        //   location.reload();
                        // }
                      }
                      ,
                      error: function (response) {
                        //console.log(response);
                        jQuery('#loader<?php echo $i;?>').hide();
                        alert(response);
                        location.reload();
                      }
                    }
                               );
                    return false;
                  }
                  else{
                    alert('Oops something went wrong!');
                  }
                }
                                                     );
                jQuery("#btn<?php echo $i;?>").click(function(){
                  var id = <?php echo $result->ID;
                  ?>;
                  var user_name = '<?php echo $result->display_name;?>';
                  var user_email = '<?php echo $result->user_email;?>';
                  jQuery("#job_title").val('');
                  jQuery("#job_description").val('');
                  jQuery("#featured_img").val('');
                  jQuery("#customer_name").val('');
                  jQuery("#customer_email").val('');
                  jQuery("#customer_address").val('');
                  jQuery("#customer_contact").val('');
                  jQuery("#installer_name").val(user_name);
                  jQuery("#installer_id").val(id);
                  jQuery("#installer-name").html("<?php echo $result->display_name;?>");
                  jQuery("#trackbox").slideToggle();
                  jQuery("#tracking-alert").hide();
                  (jQuery('body').scrollTop(0));
                }
                                                    );
                jQuery(function(){
                  jQuery('.clickable').on('click',function(){
                    var effect = jQuery(this).data('effect');
                    jQuery(this).closest('#trackbox')[effect]();
                  }
                                         )
                }
                      );
              </script>
              <?php $i++; }//end foreach 
?>
              <script type="text/javascript">
                function DeleteUser(user_id){
                  if(user_id !=''){
                    if(confirm("Are you confirm to delete this?")==true){
                      //jQuery('#loader<?php echo $i;?>').show();
                      var datas = 'user_id='+user_id;
                      var url = '<?php echo  esc_url( plugins_url( 'delete-user.php', __FILE__ ));?>';
                      jQuery.ajax({
                        type:'POST',
                        url: url,
                        data: datas,
                        catch: false,
                        success: function(response){
                          //jQuery('#loader<?php echo $i;?>').hide();
                          alert(response);
                          if(response=='User has been deleted successfully!'){
                            location.reload();
                          }
                        }
                        ,
                        error: function (response) {
                          //console.log(response);
                          //jQuery('#loader<?php echo $i;?>').hide();
                          alert(response);
                        }
                      }
                                 );
                      return false;
                    }
                  }
                  else{
                    alert('Oops something went wrong!');
                  }
                }
                //add tracking info
                jQuery(document).ready(function(){
                  jQuery("#btn-tracking").click(function(){
                    jQuery("#tracking-alert").html('');
                    jQuery("#tracking-alert").removeClass('alert-success');
                    var job_title = jQuery("#job_title").val();
                    var job_description = jQuery("#job_description").val();
                    var featured_img = jQuery("#blah").attr("src");
                    var customer_name = jQuery("#customer_name").val();
                    var customer_email = jQuery("#customer_email").val();
                    var customer_address = jQuery("#customer_address").val();
                    var customer_contact = jQuery("#customer_contact").val();
                    var installer_id = jQuery("#installer_id").val();
                    var installer_name = jQuery("#installer_name").val();
                    if( job_title == "" || job_title == "undefined" ){
                      jQuery("#tracking-alert").html('Job Title is Required.');
                      jQuery("#tracking-alert").show();
                      return false;
                    }
                    if(job_description==""||job_description=="undefined"){
                      jQuery("#tracking-alert").html('Job Description is Required.');
                      jQuery("#tracking-alert").show();
                      return false;
                    }
                    if(customer_name==""||customer_name=="undefined"){
                      jQuery("#tracking-alert").html('Customer Name is Required.');
                      jQuery("#tracking-alert").show();
                      return false;
                    }
                    if(customer_email==""||customer_email=="undefined"){
                      jQuery("#tracking-alert").html('Customer Email is Required.');
                      jQuery("#tracking-alert").show();
                      return false;
                    }
                    if(customer_contact==""||customer_contact=="undefined"){
                      jQuery("#tracking-alert").html('Customer Contact is Required.');
                      jQuery("#tracking-alert").show();
                      return false;
                    }
                    if(customer_address==""||customer_address=="undefined"){
                      jQuery("#tracking-alert").html('Customer Address is Required.');
                      jQuery("#tracking-alert").show();
                      return false;
                    }
                    if(installer_id !=''){
                      //alert(featured_img);
                      //return false;
                      jQuery("#tracking-alert").hide();
                      jQuery('#loader-tracker').show();
                      var datas = 'job_title='+job_title+
                          '&job_description='+ job_description+
                          '&featured_img='+ featured_img+
                          '&customer_name='+ customer_name+
                          '&customer_email='+customer_email+
                          '&customer_contact='+customer_contact+
                          '&customer_address='+customer_address+
                          '&installer_name='+installer_name+
                          '&installer_id='+installer_id;
                      var url = '<?php echo  esc_url( plugins_url( 'add-job.php', __FILE__ ));?>';
                      jQuery.ajax({
                        type:'POST',
                        url: url,
                        data: datas,
                        catch: false,
                        enctype: 'multipart/form-data',
                        success: function(response){
                          console.log(response);
                          jQuery('#loader-tracker').hide();
                          jQuery("#tracking-alert").removeClass('alert-danger').addClass('alert-success');
                          jQuery("#tracking-alert").html(response);
                          jQuery("#tracking-alert").show();
                          jQuery('#loginform')[0].reset();
                          // if(response=='hio'){
                          //   location.reload();
                          // }
                        }
                        ,
                        error: function (response) {
                          console.log(response);
                          jQuery('#loader-tracker').hide();
                          jQuery("#tracking-alert").removeClass('alert-success').addClass('alert-danger');
                          jQuery("#tracking-alert").html(response);
                          jQuery("#tracking-alert").show();
                        }
                      }
                                 );
                      return false;
                    }
                  }
                                               )
                }
                                      );
              </script>
              </tbody>
            <tfoot>
              <tr>
                <th width="10">#
                </th>
                <th>
                  <a href="" title="Click to Sort in desending order.">Name
                  </a>
                </th>
                <th>
                  <a href="" title="Click to Sort in desending order.">Email
                  </a>
                </th>
                <th>Action
                </th>
                <th>Status
                </th>
                <th>Assign Job
                </th>
              </tr>
            </tfoot>
            </table>
          <div class="row"  style="padding-top:10px; padding-bottom:10px;">
            <div class="col-xs-6">
              <!-- <div class="dataTables_info" id="example1_info"> Showing  1 to 20 of 14 entries </div> -->
            </div>
            <div class="col-xs-6">
              <div class="dataTables_paginate paging_bootstrap">
                <?php  
// $sql = "SELECT COUNT(order_id) FROM my_order group by order_id"; 
$sql = "SELECT * FROM wp_users order by id ASC"; 
$wpdb->get_results($sql); 
$total_records = $wpdb->num_rows;; 
//var_dump($total_records); 
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {  
$class = (isset($_GET['pid'])==$i)?'active':'';
if(!isset($_GET['pid']) && $i==1){$class ='active';}
$pagLink .= "<a class='".$class."' href='".ADMIN_URI."admin.php?page=installer&pid=".$i."'>".$i."</a>";
};  
echo $pagLink . "</div>";  
?>
                <!-- <ul class="pagination">
</ul> -->
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
<footer> 
</footer>
</aside>
<!-- /.right-side --> 
</div>
</body>
