<?php 
$order_id = $_GET['order_id']; 
if($order_id!=''&& $order_id!=null){
global $wpdb;
$sql = "SELECT * FROM my_order WHERE order_id=".$order_id." group by type";
$orders = $wpdb->get_results($sql);
// var_dump($products);
// echo '<pre>';
// print_r($results);
// echo '</pre>';
	?>
<div class="row">
          <div class="col-md-12">
            <div class="box box-primary"> 
              <!-- add multiple tabs of the form -->
              <div class="nav-tabs-custom">
              <!--   <ul class="nav nav-tabs">
                <?php require_once('dynamic-tab.php');?>
                </ul> -->
                <div class="tab-content">
                  <!-- =========================tab1==================== -->
                 <div class="tab-pane active" id="tab_1">
                    <h1>REVIEW YOUR ORDERS</h1>
                 <?php foreach ($orders as $order){
                  $cat =  $order->category;
                  $box_style = ($cat=='zoetic')?'zeotic-header':'';
                  $li_style = ($cat=='zoetic')?'zeoticli':'';
                  ?>

                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header <?php echo $box_style;?>" align="center">
                        <h3 class="box-title"><?php echo $order->type; ?></h3>
                        <?php 
                        switch ($order->type) {
                          case '20 Pyramid Tea Bags Box':
                            echo '<h4><b>(1 Box = 20 Tea bags, 1 Carton = 12*20 tea bag boxes)</b></h4>';
                            break;
                          case '125g Loose Leaf Box':
                            echo '<h4><b>(1 Carton = 12*125g Loose Leaf Boxes)</b></h4>';
                            break;
                          case '125g Loose Leaf Tin':
                            echo '<h4><b>(1 Carton = 10*125g Loose Leaf Tins)</b></h4>';
                            break;
                          case 'Variety Pack (Enveloped Pyramid Tea Bags)':
                            echo '<h4><b>(1 Box = 50 Tea Bags, 1 Cartons = 6*50 tea bag boxes)</b></h4>';
                            break;
                          case 'Variety Pack (Enveloped Pyramid Tea Bags)':
                            echo '<h4><b>(1 Box = 50 Tea Bags, 1 Cartons = 6*50 tea bag boxes)</b></h4>';
                            break;
                          
                          default:
                            echo "";
                            break;
                        } 
                        ?>
                      </div>
                      <!-- /.box-header -->
    <!-- -----------------------------------------------------------------  -->
                      <ul>
                        <li class="headingorderli <?php echo $li_style;?>">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        <?php 
                        $sql1 = "SELECT * FROM my_order WHERE order_id=".$order_id." AND type='".$order->type."'";
                        $products = $wpdb->get_results($sql1);
                        foreach ($products as $product) { ?>
                        <li>
                          <div class="col-md-3"><?php echo $product->blend_name;?> </div>
                          <div class="col-md-3"><?php echo $product->product_code;?> </div>
                          <div class="col-md-2"><?php echo $product->ctn_size;?> </div>
                          <div class="col-md-2"><?php echo $product->quantity;?> </div>
                          <div class="col-md-2"><?php echo $product->cartons;?> </div>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                    <?php } ?>
                    </div>
<!-- ---------------------------------------------------------------------------- -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }?>