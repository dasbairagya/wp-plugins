<?php 
// ----------------------for 20 Pyramid Tea Bags Box------------------------------
$unique_id = rand( 1000, 10000 );
$order_date = date( 'Y-m-d H:i:s', current_time( 'timestamp', 0 ) ); 
$status = 'pending';
/**********************/
if(isset($_POST['blend'])){
$user_id = $_POST['user_id'];
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
// print_r($product_code);
// print_r($ctn_size);
// print_r($quantity);
// print_r($cartons);
// echo '</pre>';
// $data = array();
// $response = array();
//   for($i=0;$i<=$org_count;$i++){
//     if($quantity[$i]!=''){
//       $data[] = array( 
//                 'order_id' => $user_id.$unique_id, 
//                 'user_id' => $user_id, 
//                 'type' => '20 Pyramid Tea Bags Box', 
//                 'blend_name' => $blends[$i], 
//                 'fair_trade' => $fairtrades[$i], 
//                 'quantity' => $quantity[$i], 
//                 'date' => $order_date, 
//                 'status' => $status 
//               );     
//        }
//     }
// $response['result'] = $data;
// echo '<pre>';
// print_r($response);
// echo '</pre>';


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
// print_r($product_code1);
// print_r($ctn_size1);
// print_r($quantity1);
// print_r($cartons1);
// echo '</pre>';

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
// print_r($product_code2);
// print_r($ctn_size2);
// print_r($quantity2);
// print_r($cartons2);
// echo '</pre>';
 }

// --------------------Variety Pack (Enveloped Pyramid Tea Bags)------------------------------
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
// print_r($product_code3);
// print_r($ctn_size3);
// print_r($quantity3);
// print_r($cartons3);
// echo '</pre>';

  
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
// print_r($product_code4);
// print_r($ctn_size4);
// print_r($quantity4);
// print_r($cartons4);
// echo '</pre>';

  
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
// print_r($product_code5);
// print_r($ctn_size5);
// print_r($quantity5);
// print_r($cartons5);
// echo '</pre>';

  
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
// print_r($product_code6);
// print_r($ctn_size6);
// print_r($quantity6);
// print_r($cartons6);
// echo '</pre>';
}

// ----------------------Other------------------------------
if(isset($_POST['blend7'])){
$blends7 = $_POST['blend7'];
$product_code7 = $_POST['product_code7'];
$ctn_size7 = $_POST['ctn_size7'];
$quantity7 = $_POST['quantities7'];
$cartons7 = $_POST['cartons7'];
$count7 =  count($product_code7);
$org_count7  = $count7-1;
// echo '<pre>';
// print_r($blends7);
// print_r($product_code7);
// print_r($ctn_size7);
// print_r($quantity7);
// print_r($cartons7);
// echo '</pre>';
}



/**********************Tab-2*************************/

// ----------------------1 Kg Loose Leaf Resealable Pouch------------------------------
if(isset($_POST['blend8'])){
$blends8 = $_POST['blend8'];
$product_code8 = $_POST['product_code8'];
$ctn_size8 = $_POST['ctn_size8'];
$quantity8 = $_POST['quantities8'];
$cartons8 = $_POST['cartons8'];
$count8 =  count($product_code8);
$org_count8  = $count8-1;
// echo '1kg Loose Leaf Resealble pouch';
// echo '<pre>';
// print_r($blends8);
// print_r($product_code8);
// print_r($ctn_size8);
// print_r($quantity8);
// print_r($cartons8);
// echo '</pre>';
}
// ----------------------100 Pyramid Tea Bags Box------------------------------
if(isset($_POST['blend9'])){
$blends9 = $_POST['blend9'];
$product_code9 = $_POST['product_code9'];
$ctn_size9 = $_POST['ctn_size9'];
$quantity9 = $_POST['quantities9'];
$cartons9 = $_POST['cartons9'];
$count9 =  count($product_code9);
$org_count9  = $count9-1;
// echo '100 Pyramid Tea Bags Box';
// echo '<pre>';
// print_r($blends9);
// print_r($product_code9);
// print_r($ctn_size9);
// print_r($quantity9);
// print_r($cartons9);
// echo '</pre>';
}
// ----------------------100 Enveloped Pyramid Tea Bags Box------------------------------
if(isset($_POST['blend10'])){
$blends10 = $_POST['blend10'];
$product_code10 = $_POST['product_code10'];
$ctn_size10 = $_POST['ctn_size10'];
$quantity10 = $_POST['quantities10'];
$cartons10 = $_POST['cartons10'];
$count10 =  count($product_code10);
$org_count10  = $count10-1;
// echo '100 Enveloped Pyramid Tea Bags Box';
// echo '<pre>';
// print_r($blends10);
// print_r($product_code10);
// print_r($ctn_size10);
// print_r($quantity10);
// print_r($cartons10);
// echo '</pre>';
}
// ----------------------Display Tin---------------
if(isset($_POST['blend11'])){
$blends11 = $_POST['blend11'];
$product_code11 = $_POST['product_code11'];
$ctn_size11 = $_POST['ctn_size11'];
$quantity11 = $_POST['quantities11'];
$cartons11 = $_POST['cartons11'];
$count11 =  count($product_code11);
$org_count11  = $count11-1;
// echo 'Display Tin-';
// echo '<pre>';
// print_r($blends11);
// print_r($product_code11);
// print_r($ctn_size11);
// print_r($quantity11);
// print_r($cartons11);
// echo '</pre>';
}
// ----------------------Wooden Tea Chests------------------------------
if(isset($_POST['blend12'])){
$blends12 = $_POST['blend12'];
$product_code12 = $_POST['product_code12'];
$ctn_size12 = $_POST['ctn_size12'];
$quantity12 = $_POST['quantities12'];
$cartons12 = $_POST['cartons12'];
$count12 =  count($product_code12);
$org_count12  = $count12-1;
// echo 'Wooden Tea Chests';
// echo '<pre>';
// print_r($blends12);
// print_r($product_code12);
// print_r($ctn_size12);
// print_r($quantity12);
// print_r($cartons12);
// echo '</pre>';
}
// ----------------------Other Accessories------------------------------
if(isset($_POST['blend13'])){
$blends13 = $_POST['blend13'];
$product_code13 = $_POST['product_code13'];
$ctn_size13 = $_POST['ctn_size13'];
$quantity13 = $_POST['quantities13'];
$cartons13 = $_POST['cartons13'];
$count13 =  count($product_code13);
$org_count13  = $count13-1;
// echo 'Other Accessories';
// echo '<pre>';
// print_r($blends13);
// print_r($product_code13);
// print_r($ctn_size13);
// print_r($quantity13);
// print_r($cartons13);
// echo '</pre>';
}
// ----------------------Teapots------------------------------
if(isset($_POST['blend14'])){
$blends14 = $_POST['blend14'];
$product_code14 = $_POST['product_code14'];
$ctn_size14 = $_POST['ctn_size14'];
$quantity14 = $_POST['quantities14'];
$cartons14 = $_POST['cartons14'];
$count14 =  count($product_code14);
$org_count14  = $count14-1;
// echo 'Teapots';
// echo '<pre>';
// print_r($blends14);
// print_r($product_code14);
// print_r($ctn_size14);
// print_r($quantity14);
// print_r($cartons14);
// echo '</pre>';
}
// ----------------------Tea Tray Set-----------------------------
if(isset($_POST['blend15'])){
$blends15 = $_POST['blend15'];
$product_code15 = $_POST['product_code15'];
$ctn_size15 = $_POST['ctn_size15'];
$quantity15 = $_POST['quantities15'];
$cartons15 = $_POST['cartons15'];
$count15 =  count($product_code15);
$org_count15  = $count15-1;
// echo 'Tea Tray Set';
// echo '<pre>';
// print_r($blends15);
// print_r($product_code15);
// print_r($ctn_size15);
// print_r($quantity15);
// print_r($cartons15);
// echo '</pre>';
}
// ----------------------Tea Tray Set Replacement Accessories-----------------------------
if(isset($_POST['blend16'])){
$blends16 = $_POST['blend16'];
$product_code16 = $_POST['product_code16'];
$ctn_size16 = $_POST['ctn_size16'];
$quantity16 = $_POST['quantities16'];
$cartons16 = $_POST['cartons16'];
$count16 =  count($product_code16);
$org_count16  = $count16-1;
// echo 'Tea Tray Set Replacement Accessories';
// echo '<pre>';
// print_r($blends16);
// print_r($product_code16);
// print_r($ctn_size16);
// print_r($quantity16);
// print_r($cartons16);
// echo '</pre>';
}

/**********************Tab-3*************************/

// ----------------------25 Tea Bags Box-----------------------------
if(isset($_POST['blend17'])){
$blends17 = $_POST['blend17'];
$product_code17 = $_POST['product_code17'];
$ctn_size17 = $_POST['ctn_size17'];
$quantity17 = $_POST['quantities17'];
$cartons17 = $_POST['cartons17'];
$count17 =  count($product_code17);
$org_count17  = $count17-1;
// echo '25 Tea Bags Box';
// echo '<pre>';
// print_r($blends17);
// print_r($product_code17);
// print_r($ctn_size17);
// print_r($quantity17);
// print_r($cartons17);
// echo '</pre>';
}
// ----------------------100 Pyramid Tea Bags Box---------------------------
if(isset($_POST['blend18'])){
$blends18 = $_POST['blend18'];
$product_code18 = $_POST['product_code18'];
$ctn_size18 = $_POST['ctn_size18'];
$quantity18 = $_POST['quantities18'];
$cartons18 = $_POST['cartons18'];
$count18 =  count($product_code18);
$org_count18  = $count18-1;
// echo '100 Pyramid Tea Bags Box';
// echo '<pre>';
// print_r($blends18);
// print_r($product_code18);
// print_r($ctn_size18);
// print_r($quantity18);
// print_r($cartons18);
// echo '</pre>';
}
// ----------------------Other---------------------------
if(isset($_POST['blend19'])){
$blends19 = $_POST['blend19'];
$product_code19 = $_POST['product_code19'];
$ctn_size19 = $_POST['ctn_size19'];
$quantity19 = $_POST['quantities19'];
$cartons19 = $_POST['cartons19'];
$count19 =  count($product_code19);
$org_count19  = $count19-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends19);
// print_r($product_code19);
// print_r($ctn_size19);
// print_r($quantity19);
// print_r($cartons19);
// echo '</pre>';
}


/**********************Tab-4*************************/

// ----------------------100 Tea Bags Box--------------------------
if(isset($_POST['blend20'])){
$blends20 = $_POST['blend20'];
$product_code20 = $_POST['product_code20'];
$ctn_size20 = $_POST['ctn_size20'];
$quantity20 = $_POST['quantities20'];
$cartons20 = $_POST['cartons20'];
$count20 =  count($product_code20);
$org_count20  = $count20-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends20);
// print_r($product_code20);
// print_r($ctn_size20);
// print_r($quantity20);
// print_r($cartons20);
// echo '</pre>';
}
// ----------------------100 Enveloped Tea Bags Box--------------------------
if(isset($_POST['blend21'])){
$blends21 = $_POST['blend21'];
$product_code21 = $_POST['product_code21'];
$ctn_size21 = $_POST['ctn_size21'];
$quantity21 = $_POST['quantities21'];
$cartons21 = $_POST['cartons21'];
$count21 =  count($product_code21);
$org_count21  = $count21-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends21);
// print_r($product_code21);
// print_r($ctn_size21);
// print_r($quantity21);
// print_r($cartons21);
// echo '</pre>';
}
// ----------------------1000 Tea Bags Catering Box-------------------------
if(isset($_POST['blend22'])){
$blends22 = $_POST['blend22'];
$product_code22 = $_POST['product_code22'];
$ctn_size22 = $_POST['ctn_size22'];
$quantity22 = $_POST['quantities22'];
$cartons22 = $_POST['cartons22'];
$count22 =  count($product_code22);
$org_count22  = $count22-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends22);
// print_r($product_code22);
// print_r($ctn_size22);
// print_r($quantity22);
// print_r($cartons22);
// echo '</pre>';
}
// ----------------------1000 Enveloped Tea Bags Catering Box-------------------------
if(isset($_POST['blend23'])){
$blends23 = $_POST['blend23'];
$product_code23 = $_POST['product_code23'];
$ctn_size23 = $_POST['ctn_size23'];
$quantity23 = $_POST['quantities23'];
$cartons23 = $_POST['cartons23'];
$count23 =  count($product_code23);
$org_count23  = $count23-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends23);
// print_r($product_code23);
// print_r($ctn_size23);
// print_r($quantity23);
// print_r($cartons23);
// echo '</pre>';
}
// ----------------------1 Kg Resealable Pouch-------------------------
if(isset($_POST['blend24'])){
$blends24 = $_POST['blend24'];
$product_code24 = $_POST['product_code24'];
$ctn_size24 = $_POST['ctn_size24'];
$quantity24 = $_POST['quantities24'];
$cartons24 = $_POST['cartons24'];
$count24 =  count($product_code24);
$org_count24  = $count24-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends24);
// print_r($product_code24);
// print_r($ctn_size24);
// print_r($quantity24);
// print_r($cartons24);
// echo '</pre>';
}

// ----------------------Display Tin-------------------------
if(isset($_POST['blend25'])){
$blends25 = $_POST['blend25'];
$product_code25 = $_POST['product_code25'];
$ctn_size25 = $_POST['ctn_size25'];
$quantity25 = $_POST['quantities25'];
$cartons25 = $_POST['cartons25'];
$count25 =  count($product_code25);
$org_count25  = $count25-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends25);
// print_r($product_code25);
// print_r($ctn_size25);
// print_r($quantity25);
// print_r($cartons25);
// echo '</pre>';
}

// ----------------------Other------------------------
if(isset($_POST['blend26'])){
$blends26 = $_POST['blend26'];
$product_code26 = $_POST['product_code26'];
$ctn_size26 = $_POST['ctn_size26'];
$quantity26 = $_POST['quantities26'];
$cartons26 = $_POST['cartons26'];
$count26 =  count($product_code26);
$org_count26  = $count26-1;
// echo 'Other';
// echo '<pre>';
// print_r($blends26);
// print_r($product_code26);
// print_r($ctn_size26);
// print_r($quantity26);
// print_r($cartons26);
// echo '</pre>';
}