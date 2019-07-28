<?php 
global $wpdb;
$user_id = get_current_user_id();
$unique_id = rand( 1000, 10000 );
$order_date = date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ); 
$status = 'pending';
$category1 = 'serenitea';
$category2 = 'zoetic';
/*****************************Data storing process of tab_1 Starts here***********************/
// ----------------------for 20 Pyramid Tea Bags Box------------------------------
if(isset($_POST['blend'])){
// $user_id = $_POST['user_id'];
$blends = $_POST['blend'];
$product_code = $_POST['product_code'];
$ctn_size = $_POST['ctn_size'];
$quantity = $_POST['quantities'];
$cartons = $_POST['cartons'];
// $fairtrades = $_POST['fairtrade'];
$count =  count($product_code);
$org_count  = $count-1;
// echo '<pre>';
// print_r($blends);
// print_r($fairtrades);
// print_r($quantity);
// echo '</pre>';

  for($i=0;$i<=$org_count;$i++){
    if($quantity[$i]!=''|| $cartons[$i]!=''){
      // echo $quantity[$i].', ';
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '20 Pyramid Tea Bags Box', 
                'blend_name' => $blends[$i], 
                'product_code' => $product_code[$i], 
                'ctn_size' => $ctn_size[$i], 
                'quantity' => $quantity[$i], 
                'cartons' => $cartons[$i], 
                'date' => $order_date, 
                'status' => $status, 
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );

       }//end if
    }//end for
  }//end isset()
// ----------------------125g Loose Leaf Box------------------------------
if(isset($_POST['blend1'])){
$blends1 = $_POST['blend1'];
$product_code1 = $_POST['product_code1'];
$ctn_size1 = $_POST['ctn_size1'];
$quantity1 = $_POST['quantities1'];
$cartons1 = $_POST['cartons1'];
$count1 =  count($product_code1);
$org_count1  = $count1-1;
// echo '<pre>';
// print_r($blends1);
// print_r($fairtrades1);
// print_r($quantity1);
// echo '</pre>';

  for($i=0;$i<=$org_count1;$i++){
    if($quantity1[$i]!=''||$cartons1[$i]!=''){
      //echo $quantity1[$i];
        $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '125g Loose Leaf Box', 
                'blend_name' => $blends1[$i], 
                'product_code' => $product_code1[$i], 
                'ctn_size' => $ctn_size1[$i], 
                'quantity' => $quantity1[$i], 
                'cartons' => $cartons1[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }



// ----------------------125g Loose Leaf Tin------------------------------
if(isset($_POST['blend2'])){
$blends2 = $_POST['blend2'];
$product_code2 = $_POST['product_code2'];
$ctn_size2 = $_POST['ctn_size2'];
$quantity2 = $_POST['quantities2'];
$cartons2 = $_POST['cartons2'];
$count2 =  count($product_code2);
$org_count2  = $count2-1;
// echo '<pre>';
// print_r($blends2);
// print_r($fairtrades2);
// print_r($quantity2);
// echo '</pre>';

  for($i=0;$i<=$org_count1;$i++){
    if($quantity2[$i]!=''||$cartons2[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '125g Loose Leaf Tin', 
                'blend_name' => $blends2[$i], 
                'product_code' => $product_code2[$i], 
                'ctn_size' => $ctn_size2[$i], 
                'quantity' => $quantity2[$i], 
                'cartons' => $cartons2[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// ----------------------Variety Pack (Enveloped Pyramid Tea Bags)------------------------------
if(isset($_POST['blend3'])){
$blends3 = $_POST['blend3'];
$product_code3 = $_POST['product_code3'];
$ctn_size3 = $_POST['ctn_size3'];
$quantity3 = $_POST['quantities3'];
$cartons3 = $_POST['cartons3'];
$count3 =  count($product_code3);
$org_count3  = $count3-1;
// echo '<pre>';
// print_r($blends3);
// print_r($fairtrades3);
// print_r($quantity3);
// echo '</pre>';

  for($i=0;$i<=$org_count3;$i++){
    if($quantity3[$i]!=''||$cartons3[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Variety Pack (Enveloped Pyramid Tea Bags)', 
                'blend_name' => $blends3[$i], 
                'product_code' => $product_code3[$i], 
                'ctn_size' => $ctn_size3[$i], 
                'quantity' => $quantity3[$i], 
                'cartons' => $cartons3[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// ----------------------Teapots Ceramic------------------------------
if(isset($_POST['blend4'])){
$blends4 = $_POST['blend4'];
$product_code4 = $_POST['product_code4'];
$ctn_size4 = $_POST['ctn_size4'];
$quantity4 = $_POST['quantities4'];
$cartons4 = $_POST['cartons4'];
$count4 =  count($product_code4);
$org_count4  = $count4-1;
// echo '<pre>';
// print_r($blends4);
// print_r($fairtrades4);
// print_r($quantity4);
// echo '</pre>';

  for($i=0;$i<=$org_count4;$i++){
    if($quantity4[$i]!=''){
      // echo $quantity2[$i] ;
                    $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Teapots Ceramic', 
                'blend_name' => $blends4[$i], 
                'product_code' => $product_code4[$i], 
                'ctn_size' => $ctn_size4[$i], 
                'quantity' => $quantity4[$i], 
                'cartons' => $cartons4[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// ----------------------Wooden Tea Chests------------------------------
if(isset($_POST['blend5'])){
$blends5 = $_POST['blend5'];
$product_code5 = $_POST['product_code5'];
$ctn_size5 = $_POST['ctn_size5'];
$quantity5 = $_POST['quantities5'];
$cartons5 = $_POST['cartons5'];
$count5 =  count($product_code5);
$org_count5  = $count5-1;
// echo '<pre>';
// print_r($blends5);
// print_r($fairtrades5);
// print_r($quantity5);
// echo '</pre>';

  for($i=0;$i<=$org_count5;$i++){
    if($quantity5[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Wooden Tea Chests', 
                'blend_name' => $blends5[$i], 
                'product_code' => $product_code5[$i], 
                'ctn_size' => $ctn_size5[$i], 
                'quantity' => $quantity5[$i], 
                'cartons' => $cartons5[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// ----------------------Teapots Stainless Steel------------------------------
if(isset($_POST['blend6'])){
$blends6 = $_POST['blend6'];
$product_code6 = $_POST['product_code6'];
$ctn_size6 = $_POST['ctn_size6'];
$quantity6 = $_POST['quantities6'];
$cartons6 = $_POST['cartons6'];
$count6 =  count($product_code6);
$org_count6  = $count6-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count6;$i++){
    if($quantity6[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Teapots Stainless Steel', 
                'blend_name' => $blends6[$i], 
                'product_code' => $product_code6[$i], 
                'ctn_size' => $ctn_size6[$i], 
                'quantity' => $quantity6[$i], 
                'cartons' => $cartons6[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }

   // -----------------------------Other------------------------
  if(isset($_POST['blend7'])){
$blends7 = $_POST['blend7'];
$product_code7 = $_POST['product_code7'];
$ctn_size7 = $_POST['ctn_size7'];
$quantity7 = $_POST['quantities7'];
$cartons7 = $_POST['cartons7'];
$count7 =  count($product_code7);
$org_count7  = $count7-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count7;$i++){
    if($quantity7[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Other(Serenitea Retail)', 
                'blend_name' => $blends7[$i], 
                'product_code' => $product_code7[$i], 
                'ctn_size' => $ctn_size7[$i], 
                'quantity' => $quantity7[$i], 
                'cartons' => $cartons7[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }



/*****************************Data storing process of tab_1 Ends here***********************/
/*****************************Data storing process of tab_2 Statrs here***********************/
// ----------------------100 Pyramid Tea Bags Box------------------------------

  // -------------1 Kg Loose Leaf Resealable Pouch--------------------------
if(isset($_POST['blend8'])){
$blends8 = $_POST['blend8'];
$product_code8 = $_POST['product_code8'];
$ctn_size8 = $_POST['ctn_size8'];
$quantity8 = $_POST['quantities8'];
$cartons8 = $_POST['cartons8'];
$count8 =  count($product_code8);
$org_count8  = $count8-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count8;$i++){
    if($quantity8[$i]!=''||$cartons8[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '1 Kg Loose Leaf Resealable Pouch', 
                'blend_name' => $blends8[$i], 
                'product_code' => $product_code8[$i], 
                'ctn_size' => $ctn_size8[$i], 
                'quantity' => $quantity8[$i], 
                'cartons' => $cartons8[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// -------------100 Pyramid Tea Bags Box--------------------------
if(isset($_POST['blend9'])){
$blends9 = $_POST['blend9'];
$product_code9 = $_POST['product_code9'];
$ctn_size9 = $_POST['ctn_size9'];
$quantity9 = $_POST['quantities9'];
$cartons9 = $_POST['cartons9'];
$count9 =  count($product_code9);
$org_count9  = $count9-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count9;$i++){
    if($quantity9[$i]!=''||$cartons9[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '100 Pyramid Tea Bags Box', 
                'blend_name' => $blends9[$i], 
                'product_code' => $product_code9[$i], 
                'ctn_size' => $ctn_size9[$i], 
                'quantity' => $quantity9[$i], 
                'cartons' => $cartons9[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
  // -------------100 Enveloped Pyramid Tea Bags Box-------------------------
if(isset($_POST['blend10'])){
$blends10 = $_POST['blend10'];
$product_code10 = $_POST['product_code10'];
$ctn_size10 = $_POST['ctn_size10'];
$quantity10 = $_POST['quantities10'];
$cartons10 = $_POST['cartons10'];
$count10 =  count($product_code10);
$org_count10  = $count10-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count10;$i++){
    if($quantity10[$i]!=''||$cartons10[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '100 Enveloped Pyramid Tea Bags Box', 
                'blend_name' => $blends10[$i], 
                'product_code' => $product_code10[$i], 
                'ctn_size' => $ctn_size10[$i], 
                'quantity' => $quantity10[$i], 
                'cartons' => $cartons10[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  } 
  // -------------Display Tin--------------------------
if(isset($_POST['blend11'])){
$blends11 = $_POST['blend11'];
$product_code11 = $_POST['product_code11'];
$ctn_size11 = $_POST['ctn_size11'];
$quantity11 = $_POST['quantities11'];
$cartons11 = $_POST['cartons11'];
$count11 =  count($product_code11);
$org_count11  = $count11-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count11;$i++){
    if($quantity11[$i]!=''||($cartons11[$i]!='' && $cartons11[$i]!='N/A')){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Display Tin(Serenitea Food Service)', 
                'blend_name' => $blends11[$i], 
                'product_code' => $product_code11[$i], 
                'ctn_size' => $ctn_size11[$i], 
                'quantity' => $quantity11[$i], 
                'cartons' => $cartons11[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
  // -------------Wooden Tea Chests--------------------------
if(isset($_POST['blend12'])){
$blends12 = $_POST['blend12'];
$product_code12 = $_POST['product_code12'];
$ctn_size12 = $_POST['ctn_size12'];
$quantity12 = $_POST['quantities12'];
$cartons12 = $_POST['cartons12'];
$count12 =  count($product_code12);
$org_count12  = $count12-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count12;$i++){
    if($quantity12[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Wooden Tea Chests', 
                'blend_name' => $blends12[$i], 
                'product_code' => $product_code12[$i], 
                'ctn_size' => $ctn_size12[$i], 
                'quantity' => $quantity12[$i], 
                'cartons' => $cartons12[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }  
  // -------------Other Accessories--------------------------
if(isset($_POST['blend13'])){
$blends13 = $_POST['blend13'];
$product_code13 = $_POST['product_code13'];
$ctn_size13 = $_POST['ctn_size13'];
$quantity13 = $_POST['quantities13'];
$cartons13 = $_POST['cartons13'];
$count13 =  count($product_code13);
$org_count13  = $count13-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count13;$i++){
    if($quantity13[$i]!=''||($cartons13[$i]!='' && $cartons13[$i]!='N/A')){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Other Accessories', 
                'blend_name' => $blends13[$i], 
                'product_code' => $product_code13[$i], 
                'ctn_size' => $ctn_size13[$i], 
                'quantity' => $quantity13[$i], 
                'cartons' => $cartons13[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  } 
   // -------------Teapots-------------------------
if(isset($_POST['blend114'])){
$blends14 = $_POST['blend14'];
$product_code14 = $_POST['product_code14'];
$ctn_size14 = $_POST['ctn_size14'];
$quantity14 = $_POST['quantities14'];
$cartons14 = $_POST['cartons14'];
$count14 =  count($product_code14);
$org_count14  = $count14-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count14;$i++){
    if($quantity14[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Teapots', 
                'blend_name' => $blends14[$i], 
                'product_code' => $product_code14[$i], 
                'ctn_size' => $ctn_size14[$i], 
                'quantity' => $quantity14[$i], 
                'cartons' => $cartons14[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }  
   // -------------Tea Tray Set-------------------------
if(isset($_POST['blend15'])){
$blends15 = $_POST['blend15'];
$product_code15 = $_POST['product_code15'];
$ctn_size15 = $_POST['ctn_size15'];
$quantity15 = $_POST['quantities15'];
$cartons15 = $_POST['cartons15'];
$count15 =  count($product_code15);
$org_count15  = $count15-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count15;$i++){
    if($quantity15[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Tea Tray Set', 
                'blend_name' => $blends15[$i], 
                'product_code' => $product_code15[$i], 
                'ctn_size' => $ctn_size15[$i], 
                'quantity' => $quantity15[$i], 
                'cartons' => $cartons15[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }  
   // -------------Tea Tray Set Replacement Accessories------------------------
if(isset($_POST['blend16'])){
$blends16 = $_POST['blend16'];
$product_code16 = $_POST['product_code16'];
$ctn_size16 = $_POST['ctn_size16'];
$quantity16 = $_POST['quantities16'];
$cartons16 = $_POST['cartons16'];
$count16 =  count($product_code16);
$org_count16  = $count16-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count16;$i++){
    if($quantity16[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Tea Tray Set Replacement Accessories', 
                'blend_name' => $blends16[$i], 
                'product_code' => $product_code16[$i], 
                'ctn_size' => $ctn_size16[$i], 
                'quantity' => $quantity16[$i], 
                'cartons' => $cartons16[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category1, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
/*****************************Data storing process of tab_2 Ends here***********************/
/*****************************Data storing process of tab_3 Statrs here***********************/

// ----------------------25 Tea Bags Box-----------------------------
if(isset($_POST['blend17'])){
$blends17 = $_POST['blend17'];
$product_code17 = $_POST['product_code17'];
$ctn_size17 = $_POST['ctn_size17'];
$quantity17 = $_POST['quantities17'];
$cartons17 = $_POST['cartons17'];
$count17 =  count($product_code17);
$org_count17  = $count17-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count17;$i++){
    if($quantity17[$i]!=''||$cartons17[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '25 Tea Bags Box', 
                'blend_name' => $blends17[$i], 
                'product_code' => $product_code17[$i], 
                'ctn_size' => $ctn_size17[$i], 
                'quantity' => $quantity17[$i], 
                'cartons' => $cartons17[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2,  
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// ----------------------100 Pyramid Tea Bags Box-----------------------------
if(isset($_POST['blend18'])){
$blends18 = $_POST['blend18'];
$product_code18 = $_POST['product_code18'];
$ctn_size18 = $_POST['ctn_size18'];
$quantity18 = $_POST['quantities18'];
$cartons18 = $_POST['cartons18'];
$count18 =  count($product_code18);
$org_count18  = $count18-1;
// echo '<pre>';
// print_r($blends6);
// print_r($fairtrades6);
// print_r($quantity6);
// echo '</pre>';

  for($i=0;$i<=$org_count18;$i++){
    if($quantity18[$i]!=''||$cartons18[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '100 Pyramid Tea Bags Box', 
                'blend_name' => $blends18[$i], 
                'product_code' => $product_code18[$i], 
                'ctn_size' => $ctn_size18[$i], 
                'quantity' => $quantity18[$i], 
                'cartons' => $cartons18[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
// ----------------------Other-----------------------------
if(isset($_POST['blend19'])){
$blends19 = $_POST['blend19'];
$product_code19 = $_POST['product_code19'];
$ctn_size19 = $_POST['ctn_size19'];
$quantity19 = $_POST['quantities19'];
$cartons19 = $_POST['cartons19'];
$count19 =  count($product_code19);
$org_count19  = $count19-1;
// echo '<pre>';
// print_r($blends19);
// print_r($fairtrades19);
// print_r($quantity19);
// echo '</pre>';

  for($i=0;$i<=$org_count19;$i++){
    if($quantity19[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Other(Zoetic Retail)', 
                'blend_name' => $blends19[$i], 
                'product_code' => $product_code19[$i], 
                'ctn_size' => $ctn_size19[$i], 
                'quantity' => $quantity19[$i], 
                'cartons' => $cartons19[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }



  /*****************************Data storing process of tab_3 Ends here***********************/
/*****************************Data storing process of tab_4 Statrs here***********************/


// ----------------------100 Tea Bags Box--------------------------
if(isset($_POST['blend20'])){
$blends20 = $_POST['blend20'];
$product_code20 = $_POST['product_code20'];
$ctn_size20 = $_POST['ctn_size20'];
$quantity20 = $_POST['quantities20'];
$cartons20 = $_POST['cartons20'];
$count20 =  count($product_code20);
$org_count20  = $count20-1;
// echo '<pre>';
// print_r($blends20);
// print_r($fairtrades20);
// print_r($quantity20);
// echo '</pre>';

  for($i=0;$i<=$org_count20;$i++){
    if($quantity20[$i]!=''||$cartons20[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '100 Tea Bags Box', 
                'blend_name' => $blends20[$i], 
                'product_code' => $product_code20[$i], 
                'ctn_size' => $ctn_size20[$i], 
                'quantity' => $quantity20[$i], 
                'cartons' => $cartons20[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }

// ----------------------100 Enveloped Tea Bags Box---------------------------
if(isset($_POST['blend21'])){
$blends21 = $_POST['blend21'];
$product_code21 = $_POST['product_code21'];
$ctn_size21 = $_POST['ctn_size21'];
$quantity21 = $_POST['quantities21'];
$cartons21 = $_POST['cartons21'];
$count21 =  count($product_code21);
$org_count21  = $count21-1;
// echo '<pre>';
// print_r($blends21);
// print_r($fairtrades21);
// print_r($quantity21);
// echo '</pre>';

  for($i=0;$i<=$org_count21;$i++){
    if($quantity21[$i]!=''||$cartons21[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '100 Enveloped Tea Bags Box', 
                'blend_name' => $blends21[$i], 
                'product_code' => $product_code21[$i], 
                'ctn_size' => $ctn_size21[$i], 
                'quantity' => $quantity21[$i], 
                'cartons' => $cartons21[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }


  // ----------------------1000 Tea Bags Catering Box---------------------------
if(isset($_POST['blend22'])){
$blends22 = $_POST['blend22'];
$product_code22 = $_POST['product_code22'];
$ctn_size22 = $_POST['ctn_size22'];
$quantity22 = $_POST['quantities22'];
$cartons22 = $_POST['cartons22'];
$count22 =  count($product_code22);
$org_count22  = $count22-1;
// echo '<pre>';
// print_r($blends22);
// print_r($fairtrades22);
// print_r($quantity22);
// echo '</pre>';

  for($i=0;$i<=$org_count22;$i++){
    if($quantity22[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '1000 Tea Bags Catering Box', 
                'blend_name' => $blends22[$i], 
                'product_code' => $product_code22[$i], 
                'ctn_size' => $ctn_size22[$i], 
                'quantity' => $quantity22[$i], 
                'cartons' => $cartons22[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  } 


   // ----------------------1000 Enveloped Tea Bags Catering Box--------------------------
if(isset($_POST['blend23'])){
$blends23 = $_POST['blend23'];
$product_code23 = $_POST['product_code23'];
$ctn_size23 = $_POST['ctn_size23'];
$quantity23 = $_POST['quantities23'];
$cartons23 = $_POST['cartons23'];
$count23 =  count($product_code23);
$org_count23  = $count23-1;
// echo '<pre>';
// print_r($blends22);
// print_r($fairtrades22);
// print_r($quantity22);
// echo '</pre>';

  for($i=0;$i<=$org_count23;$i++){
    if($quantity23[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '1000 Enveloped Tea Bags Catering Box', 
                'blend_name' => $blends23[$i], 
                'product_code' => $product_code23[$i], 
                'ctn_size' => $ctn_size23[$i], 
                'quantity' => $quantity23[$i], 
                'cartons' => $cartons23[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
   // ----------------------1 Kg Resealable Pouch--------------------------
if(isset($_POST['blend24'])){
$blends24 = $_POST['blend24'];
$product_code24 = $_POST['product_code24'];
$ctn_size24 = $_POST['ctn_size24'];
$quantity24 = $_POST['quantities24'];
$cartons24 = $_POST['cartons24'];
$count24 =  count($product_code24);
$org_count24  = $count24-1;
// echo '<pre>';
// print_r($blends24);
// print_r($fairtrades24);
// print_r($quantity24);
// echo '</pre>';

  for($i=0;$i<=$org_count24;$i++){
    if($quantity24[$i]!=''||$cartons24[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => '1 Kg Resealable Pouch', 
                'blend_name' => $blends24[$i], 
                'product_code' => $product_code24[$i], 
                'ctn_size' => $ctn_size24[$i], 
                'quantity' => $quantity24[$i], 
                'cartons' => $cartons24[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }

 // ----------------------Display Tin--------------------------
if(isset($_POST['blend25'])){
$blends25 = $_POST['blend25'];
$product_code25 = $_POST['product_code25'];
$ctn_size25 = $_POST['ctn_size25'];
$quantity25 = $_POST['quantities25'];
$cartons25 = $_POST['cartons25'];
$count25 =  count($product_code25);
$org_count25  = $count25-1;
// echo '<pre>';
// print_r($blends25);
// print_r($fairtrades25);
// print_r($quantity25);
// echo '</pre>';

  for($i=0;$i<=$org_count25;$i++){
    if($quantity25[$i]!=''||$cartons25[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Display Tin(Zoetic Food Service)', 
                'blend_name' => $blends25[$i], 
                'product_code' => $product_code25[$i], 
                'ctn_size' => $ctn_size25[$i], 
                'quantity' => $quantity25[$i], 
                'cartons' => $cartons25[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }
 // ----------------------Other--------------------------
if(isset($_POST['blend26'])){
$blends26 = $_POST['blend26'];
$product_code26 = $_POST['product_code26'];
$ctn_size26 = $_POST['ctn_size26'];
$quantity26 = $_POST['quantities26'];
$cartons26 = $_POST['cartons26'];
$count26 =  count($product_code26);
$org_count26  = $count26-1;
// echo '<pre>';
// print_r($blends26);
// print_r($product_code26);
// print_r($ctn_size26);
// print_r($quantity26);
// print_r($cartons26);
// print_r($org_count26);
// echo '</pre>';

  for($i=0;$i<=$org_count26;$i++){
    if($quantity26[$i]!=''){
      // echo $quantity2[$i] ;
               $wpdb->insert( 
              // 'pyramid_tea_box', 
              'my_order', 
              array( 
                'order_id' => $user_id.$unique_id, 
                'user_id' => $user_id, 
                'type' => 'Other(Zoetic Food Service)', 
                'blend_name' => $blends26[$i], 
                'product_code' => $product_code26[$i], 
                'ctn_size' => $ctn_size26[$i], 
                'quantity' => $quantity26[$i], 
                'cartons' => $cartons26[$i], 
                'date' => $order_date, 
                'status' => $status,
                'category' => $category2, 
              ), 
              array( 
                '%s', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%d', 
                '%d', 
                '%s', 
                '%s', 
                '%s', 
                '%s', 
              ) 
            );
       }//end if
    }//end for
  }


/*****************************Data storing process of tab_4 Ends here***********************/

/***************************************mail to user**********************************************/
$current_user = wp_get_current_user();
$form_email   = $current_user->user_email;
$vendor_name  = $current_user->display_name;
$order_id = $user_id.$unique_id;
if($order_id!=''&& $order_id!=null){
$sql = "SELECT * FROM my_order WHERE order_id=".$order_id." group by type";
$orders = $wpdb->get_results($sql);
$headers="From:".$vendor_name."< ".$form_email. " >\r\n";
$headers .= "Reply-To: web230117@goigi.asia\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$to = 'web230117@goigi.asia'.','.$form_email;
$subject = "New Order";
$message = '<html>
            <head></head> 
              <body>
              <h1>New Order By: <em> '.$vendor_name.'</em></h1>
              <h3><u>Order Details</u>:</h3>';
                foreach ($orders as $order){
                $message .='<h3 style="color: #004496;"> Type: '.$order->type.'</h3>
                <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:15px; margin-left:10px;">
                            <thead>
                              <tr>
                                  <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>Tea Blend</strong></th>
                                  <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>Product Code</strong></th>
                                  <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>CTN Size</strong></th>
                                  <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>ORDER UNITS</strong></th>
                                  <th style="border: 1px solid #dddddd; text-align: left; padding: 8px;"><strong>ORDER CARTONS</strong></th>
                              </tr>
                            </thead>';
                        
                        $sql1 = "SELECT * FROM my_order WHERE order_id=".$order_id." AND type='".$order->type."'";
                        $products = $wpdb->get_results($sql1);
                        foreach ($products as $product) { 
                        $message .='<tr>
                          <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$product->blend_name.'</td>
                          <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'.$product->product_code.'</td>
                          <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $product->ctn_size.'</td>
                          <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $product->quantity.'</td>
                          <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'. $product->cartons.'</td>
                          </tr>';
                         } 
                      $message .='</table>';
                     } 
                    $message .='<br /> <center style="color:blue;">© 2017 SereniTEA Infusions. All rights reserved.</center>
                        </body></html>';
            mail($to,$subject,$message,$headers);
}

/*****************************Ends of Data Saving process***********************************/