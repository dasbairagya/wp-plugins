<?php 
// ----------------------for 20 Pyramid Tea Bags Box------------------------------
$blends = $_POST['blend'];
$user_id = $_POST['user_id']; 
$fairtrades = $_POST['fairtrade'];
$quantity = $_POST['quantities'];
$count =  count($quantity);
$org_count  = $count-1;
// echo '<pre>';
// print_r($blends);
// print_r($fairtrades);
// print_r($quantity);
// echo '</pre>';


  for($i=0;$i<=$org_count;$i++){
    if($quantity[$i]!=''){
              $wpdb->insert( 
              'pyramid_tea_box', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends[$i], 
                'fair_trade' => $fairtrades[$i], 
                'quantity' => $quantity[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for
// ----------------------20 Pyramid Tea Bags Tin------------------------------
$blends1 = $_POST['blend1'];
$fairtrades1 = $_POST['fairtrade1'];
$quantity1 = $_POST['quantities1'];
$count1 =  count($quantity1);
$org_count1  = $count1-1;
// echo '<pre>';
// print_r($blends1);
// print_r($fairtrades1);
// print_r($quantity1);
// echo '</pre>';

  for($i=0;$i<=$org_count1;$i++){
    if($quantity1[$i]!=''){
      // echo $quantity1[$i] ;
              $wpdb->insert( 
              'pyramid_tea_tin', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends1[$i], 
                'fair_trade' => $fairtrades1[$i], 
                'quantity' => $quantity1[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for
// ----------------------125g Loose Leaf Tea Box------------------------------
$blends2 = $_POST['blend2'];
$fairtrades2 = $_POST['fairtrade2'];
$quantity2 = $_POST['quantities2'];
$count2 =  count($quantity2);
$org_count2  = $count2-1;
// echo '<pre>';
// print_r($blends2);
// print_r($fairtrades2);
// print_r($quantity2);
// echo '</pre>';

  for($i=0;$i<=$org_count1;$i++){
    if($quantity2[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              'loose_tea_box', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends2[$i], 
                'fair_trade' => $fairtrades2[$i], 
                'quantity' => $quantity2[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for
// ----------------------125g Loose Leaf Tea Tin------------------------------
$blends3 = $_POST['blend3'];
$fairtrades3 = $_POST['fairtrade3'];
$quantity3 = $_POST['quantities3'];
$count3 =  count($quantity3);
$org_count3  = $count3-1;
// echo '<pre>';
// print_r($blends3);
// print_r($fairtrades3);
// print_r($quantity3);
// echo '</pre>';

  for($i=0;$i<=$org_count3;$i++){
    if($quantity3[$i]!=''){
      // echo $quantity2[$i] ;
              $wpdb->insert( 
              'loose_tea_tin', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends3[$i], 
                'fair_trade' => $fairtrades3[$i], 
                'quantity' => $quantity3[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for
// ----------------------Variety Pack (Enveloped Pyramid Tea Bags)------------------------------
$blends4 = $_POST['blend4'];
$fairtrades4 = $_POST['fairtrade4'];
$quantity4 = $_POST['quantities4'];
$count4 =  count($quantity4);
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
              'variety_pack', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends4[$i], 
                'fair_trade' => $fairtrades4[$i], 
                'quantity' => $quantity4[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for
// ----------------------Wooden Tea Chests------------------------------
$blends5 = $_POST['blend5'];
$fairtrades5 = $_POST['fairtrade5'];
$quantity5 = $_POST['quantities5'];
$count5 =  count($quantity5);
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
              'wooden_tea_chests', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends5[$i], 
                'fair_trade' => $fairtrades5[$i], 
                'quantity' => $quantity5[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for
// ----------------------Accessories & Teaware------------------------------
$blends6 = $_POST['blend6'];
$fairtrades6 = $_POST['fairtrade6'];
$quantity6 = $_POST['quantities6'];
$count6 =  count($quantity5);
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
              'accessories', 
              array( 
                'user_id' => $user_id, 
                'blend_name' => $blends6[$i], 
                'fair_trade' => $fairtrades6[$i], 
                'quantity' => $quantity6[$i] 
              ), 
              array( 
                '%d', 
                '%s', 
                '%s', 
                '%d' 
              ) 
            );
       }//end if
    }//end for

    ?>