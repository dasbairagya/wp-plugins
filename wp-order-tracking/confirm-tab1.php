 <div class="tab-pane active" id="tab_1">
                  <h1><b>ORDER FORM: SERENITEA RETAIL PRODUCTS</b></h1>
 					<!-- // ========20 Pyramid Tea Bags Box=========== -->
                  <?php $flag=false; 
                    for($i=0;$i<=$org_count;$i++){
                          if($quantity[$i]!=''||$cartons[$i]!=''){ 
                            $flag=true;
                            }
                        }
                      /**********genereate the tab_1 content if data exits*******/
                     if($flag){ 
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header" align="center">
                        <h3 class="box-title">20 Pyramid Tea Bags Box</h3>

                        <h4><b>(1 Box = 20 Tea bags, 1 Carton = 12*20 tea bag boxes)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        <?php for($i=0;$i<=$org_count;$i++){
                          if($quantity[$i]!=''||$cartons[$i]!=''){ ?>
                           <li>

                           <div class="col-md-3"><input type="text" name="blend[]" value="<?php echo $blends[$i];?>" readonly> </div>
                          <div class="col-md-3"><input type="text" size="" name="product_code[]" value="<?php echo $product_code[$i];?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size[]" value="<?php echo $ctn_size[$i];?>" readonly></div>
                          <div class="col-md-2">
                            <input name="quantities[]" id="orderunit"  value="<?php echo $quantity[$i];?>" type="text" size="4" placeholder="0" />
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons[]" value="<?php echo $cartons[$i];?>" placeholder="0"></div>

                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                      </div>
                  
                    <?php } 
   // ----------------------125g Loose Leaf Box----------------------------
                      $flag1 = false;
                    for($i=0;$i<=$org_count1;$i++){
                          if($quantity1[$i]!=''||$cartons1[$i]!=''){ 
                            $flag1=true;
                            }
                        }
                     if($flag1){
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">125g Loose Leaf Box</h3>

                        <h4><b>(1 Carton = 12*125g Loose Leaf Boxes)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count1;$i++){
                          if($quantity1[$i]!=''||$cartons1[$i]!=''){ ?>
                        <li>
                           <div class="col-md-3"><input type="text" name="blend1[]" value="<?php echo $blends1[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code1[]" value="<?php echo $product_code1[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size1[]" value="<?php echo $ctn_size1[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities1[]" id="orderunit"  value="<?php echo $quantity1[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons1[]" value="<?php echo $cartons1[$i]; ?>" ></div>
                            
                          
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                      
                    </div>
                    <?php }   
               // ----------------------125g Loose Leaf Tin-----------------------
                      $flag2 = false;
                    for($i=0;$i<=$org_count2;$i++){
                          if($quantity2[$i]!=''||$cartons2[$i]!=''){ 
                            $flag2=true;
                            }
                        }
                     if($flag2){
                    ?>
                  
                    
                   <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">125g Loose Leaf Tin</h3>
                        <h4><b>(1 Carton = 10*125g Loose Leaf Tins)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                         <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count2;$i++){
                          if($quantity2[$i]!=''||$cartons2[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend2[]" value="<?php echo $blends2[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code2[]" value="<?php echo $product_code2[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size2[]" value="<?php echo $ctn_size2[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities2[]" id="orderunit"  value="<?php echo $quantity2[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons2[]" value="<?php echo $cartons2[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end 
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } 
// ----------------------------Variety Pack (Enveloped Pyramid Tea Bags)-----------------
                      $flag3 = false;
                    for($i=0;$i<=$org_count3;$i++){
                          if($quantity3[$i]!=''||$cartons3[$i]!=''){ 
                            $flag3=true;
                            }
                        }
                     if($flag3){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                    <div class="box-header" align="center">
                        <h3 class="box-title">Variety Pack (Enveloped Pyramid Tea Bags)</h3>

                        <h4><b>
                        (1 Box = 50 Tea Bags, 1 Cartons = 6*50 tea bag boxes)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count3;$i++){
                          if($quantity3[$i]!=''||$cartons3[$i]!=''){ ?>
                           <li>
                           <div class="col-md-3"><input type="text" name="blend3[]" value="<?php echo $blends3[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code3[]" value="<?php echo $product_code3[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size3[]" value="<?php echo $ctn_size3[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities3[]" id="orderunit"  value="<?php echo $quantity3[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons3[]" value="<?php echo $cartons3[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 
// -----------------------------Teapots Ceramic---------------------------
                      $flag4 = false;
                    for($i=0;$i<=$org_count4;$i++){
                          if($quantity4[$i]!=''){ 
                            $flag4=true;
                            }
                        }
                     if($flag4){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Teapots Ceramic</h3>
                        <p ></p>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count4;$i++){
                          if($quantity4[$i]!=''){ ?>
                           <li>
                           <div class="col-md-3"><input type="text" name="blend4[]" value="<?php echo $blends4[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code4[]" value="<?php echo $product_code4[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size4[]" value="<?php echo $ctn_size4[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities4[]" id="orderunit"  value="<?php echo $quantity4[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons4[]" value="<?php echo $cartons4[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 
                    // -----------------------------Wooden Tea Chests------------------------
                      $flag5 = false;
                    for($i=0;$i<=$org_count5;$i++){
                          if($quantity5[$i]!=''){ 
                            $flag5=true;
                            }
                        }
                     if($flag5){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Wooden Tea Chests</h3>
                        <p ></p>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS<strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS<strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count5;$i++){
                          if($quantity5[$i]!=''){ ?>
                          <li>
                           <div class="col-md-3"><input type="text" name="blend5[]" value="<?php echo $blends5[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code5[]" value="<?php echo $product_code5[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size5[]" value="<?php echo $ctn_size5[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities5[]" id="orderunit"  value="<?php echo $quantity5[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons5[]" value="<?php echo $cartons5[$i]; ?>" ></div>

                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 
// ------------------------------------Teapots Stainless Steel----------------------------
                    $flag6 = false;
                    for($i=0;$i<=$org_count6;$i++){
                          if($quantity6[$i]!=''){ 
                            $flag6=true;
                            }
                        }
                     if($flag6){
                      // echo 'accessories';
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Teapots Stainless Steel</h3>
                        <p ></p>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count6;$i++){
                          if($quantity6[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3"><input type="text" name="blend6[]" value="<?php echo $blends6[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code6[]" value="<?php echo $product_code6[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size6[]" value="<?php echo $ctn_size6[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities6[]" id="orderunit"  value="<?php echo $quantity6[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons6[]" value="<?php echo $cartons6[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 

                 // -----------------------------Other------------------------
                      $flag7 = false;
                    for($i=0;$i<=$org_count7;$i++){
                          if($quantity7[$i]!=''){ 
                            $flag7=true;
                            }
                        }
                     if($flag7){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Other</h3>
                        <p ></p>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count7;$i++){
                          if($quantity7[$i]!=''){ ?>
                          <li>
                           <div class="col-md-3"><input type="text" name="blend7[]" value="<?php echo $blends7[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code7[]" value="<?php echo $product_code7[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size7[]" value="<?php echo $ctn_size7[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities7[]" id="orderunit"  value="<?php echo $quantity7[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons7[]" value="<?php echo $cartons7[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php }  ?>
              </div>
              <!-- -------------------------------------------------- -->