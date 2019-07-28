<?php 
global $wpdb;
$user_id = get_current_user_id();
$current_user   = wp_get_current_user();
$role_name      = $current_user->roles[0];
$sqli = "SELECT * FROM my_order WHERE user_id =".$user_id." group by order_id order by id DESC";
$results = $wpdb->get_results($sqli);
// echo '<pre>';
// print_r($results);
// echo '</pre>';
?>

    <section class="content">
      <div class="row">
        <div class="col-xs-12"><!-- /.box -->
          <form action="" method="get" name="form4" id="form4">
            <div class="box"><!-- /.box-header -->
              <div class="box-body table-responsive">
                <!-- <div class="rws-messageshow">14   results found!</div> -->
                <div class="row" style="padding-bottom:10px; padding-top:5px;">
                  <div class="col-xs-6">
                    <button class="btn btn-primary" type="button" name="rws-addbtn" onclick="document.location.href='<?php echo admin_url();?>/admin.php?page=add-new-order'"> Add New </button>
                    &nbsp; </div>
                  <div class="col-xs-6" ></div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                     <!--  <th width="10"><input name="chkSelectAll" type="checkbox" id="chkSelectAll" value="checkbox" onclick="javascript:selectAllChk();" /></th> -->
                     <th>ID</th>
                      <th><a href="" title="Click to Sort in desending order.">ORDER ID</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Invoice No</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Add Date</a></th>
                      <th><a href="" title="Click to Sort in desending order.">Status</a></th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i =1; foreach ($results as $result) { ?>
                    <tr>
                      <!-- <td><input name="chkid[1]" type="checkbox" id="chkid[1]" value="" /></td> -->
                      <td><?php echo $i;?></td>
                      <td><?php echo $result->order_id;?></td>
                      <td>SERENITEA-<?php echo $i;?></td>
                      <td><?php echo $result->date;?></td>
                      <td><?php echo $result->status;?></td>
                      <td><a href="<?php echo admin_url();?>admin.php?page=order-details&order_id=<?php echo $result->order_id;?>">View Order</a></td>
                    </tr>
                    <?php $i++; } ?>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th width="10">#</th>
                      <th><a href="order-list.php?page=ukcl&PageNo=&field=order_id&order=ASC&search=" title="Click to Sort in desending order.">ORDER ID</a></th>
                      <th><a href="order-list.php?page=ukcl&PageNo=&field=order_id&order=ASC&search=" title="Click to Sort in desending order.">Invoice No</a></th>
                      <th><a href="order-list.php?page=ukcl&PageNo=&field=created_date&order=ASC&search=" title="Click to Sort in desending order.">Add Date</a></th>
                      <th><a href="order-list.php?page=ukcl&PageNo=&field=orderstatus&order=ASC&search=" title="Click to Sort in desending order.">Status</a></th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
                <div class="row"  style="padding-top:10px; padding-bottom:10px;">
                  <div class="col-xs-6">
                    <!-- <div class="dataTables_info" id="example1_info"> Showing  1 to 20 of 14 entries </div> -->
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
          </form>
        </div>
      </div>
    </section>