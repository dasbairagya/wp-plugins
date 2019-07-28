<div class="tab-pane" id="tab_2">
                    <h1><b>ORDER FORM: SERENITEA FOOD SERVICE PRODUCTS</b></h1>
                    <?php
// ------------------------------------Teapots Stainless Steel----------------------------
                   $flag8=false; 
                    for($i=0;$i<=$org_count8;$i++){
                          if($quantity8[$i]!=''||$cartons8[$i]!=''){ 
                            $flag8=true;
                            }
                        }
                      /**********genereate the tab_1 content if data exits*******/
                     if($flag8){ 
                      // echo $flag8;
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header" align="center">
                        <h3 class="box-title">1 Kg Loose Leaf Resealable Pouch </h3>

                        <h4><b>(1 Carton = 4x1Kg pouches)</b></h4>
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
                        <?php for($i=0;$i<=$org_count8;$i++){
                          if($quantity8[$i]!=''||$cartons8[$i]!=''){ ?>
                           <li>

                           <div class="col-md-3"><input type="text" name="blend8[]" value="<?php echo $blends8[$i];?>" readonly> </div>
                          <div class="col-md-3"><input type="text" size="" name="product_code8[]" value="<?php echo $product_code8[$i];?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size8[]" value="<?php echo $ctn_size8[$i];?>" readonly></div>
                          <div class="col-md-2">
                            <input name="quantities8[]" id="orderunit"  value="<?php echo $quantity8[$i];?>" type="text" size="4" placeholder="0" />
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons8[]" value="<?php echo $cartons8[$i];?>" placeholder="0"></div>

                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                      </div>
                  
                    <?php } 
                    // ----------------------100 Pyramid Tea Bags Box----------------------------
                      $flag9 = false;
                    for($i=0;$i<=$org_coun9;$i++){
                          if($quantity9[$i]!=''||$cartons9[$i]!=''){ 
                            $flag9=true;
                            }
                        }
                     if($flag9){
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header" align="center">
                        <h3 class="box-title">100 Pyramid Tea Bags Box</h3>

                        <h4><b>(1Box= 100 Tea bags, 1 Carton = 6x 100 tea bag boxes)</b></h4>
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
                        
                        <?php for($i=0;$i<=$org_count9;$i++){
                          if($quantity9[$i]!=''||$cartons9[$i]!=''){ ?>
                        <li>
                           <div class="col-md-3"><input type="text" name="blend9[]" value="<?php echo $blends9[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code9[]" value="<?php echo $product_code9[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size9[]" value="<?php echo $ctn_size9[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities9[]" id="orderunit"  value="<?php echo $quantity9[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons9[]" value="<?php echo $cartons9[$i]; ?>" ></div>
                            
                          
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                      
                    </div>
                    <?php }   
               // ----------------------100 Enveloped Pyramid Tea Bags Box-----------------------
                      $flag10 = false;
                    for($i=0;$i<=$org_count10;$i++){
                          if($quantity10[$i]!=''||$cartons10[$i]!=''){ 
                            $flag10=true;
                            }
                        }
                     if($flag10){
                    ?>
                  
                    
                   <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">100 Enveloped Pyramid Tea Bags Box</h3>
                        <h4><b>(1Box= 100 Tea bags, 1 Carton = 6x 100 tea bag boxes)</b></h4>
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
                        
                        <?php for($i=0;$i<=$org_count10;$i++){
                          if($quantity10[$i]!=''||$cartons10[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend10[]" value="<?php echo $blends10[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code10[]" value="<?php echo $product_code10[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size10[]" value="<?php echo $ctn_size10[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities10[]" id="orderunit"  value="<?php echo $quantity10[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons10[]" value="<?php echo $cartons10[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } 
// ----------------------------Display Tin-----------------
                      $flag11 = false;
                    for($i=0;$i<=$org_count11;$i++){
                          if($quantity11[$i]!=''||($cartons11[$i]!='' && $cartons11[$i]!='N/A')){ 
                            $flag11=true;
                            }
                        }
                     if($flag11){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                    <div class="box-header" align="center">
                        <h3 class="box-title">Display Tin</h3>

                        <h4><b>
                        (1Carton = 6 Tins)</b></h4>
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
                        
                        <?php for($i=0;$i<=$org_count11;$i++){
                          if($quantity11[$i]!=''||($cartons11[$i]!='' && $cartons11[$i]!='N/A') ){?>
                           <li>
                           <div class="col-md-3"><input type="text" name="blend11[]" value="<?php echo $blends11[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code11[]" value="<?php echo $product_code11[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size11[]" value="<?php echo $ctn_size11[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities11[]" id="orderunit"  value="<?php echo $quantity11[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons11[]" value="<?php echo $cartons11[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 
// -----------------------------Wooden Tea Chests---------------------------
                      $flag12 = false;
                    for($i=0;$i<=$org_count12;$i++){
                          if($quantity12[$i]!=''){ 
                            $flag12=true;
                            }
                        }
                     if($flag12){
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
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count12;$i++){
                          if($quantity12[$i]!=''){ ?>
                           <li>
                           <div class="col-md-3"><input type="text" name="blend12[]" value="<?php echo $blends12[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code12[]" value="<?php echo $product_code12[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size12[]" value="<?php echo $ctn_size12[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities12[]" id="orderunit"  value="<?php echo $quantity12[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons12[]" value="<?php echo $cartons12[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 
                    // -----------------------------Other Accessories------------------------
                      $flag13 = false;
                    for($i=0;$i<=$org_count13;$i++){
                          if($quantity13[$i]!=''||($cartons13[$i]!='' && $cartons13[$i]!='N/A')){ 
                            $flag13=true;
                            }
                        }
                     if($flag13){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Other Accessories</h3>
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
                        
                        <?php for($i=0;$i<=$org_count13;$i++){
                          if($quantity13[$i]!=''||($cartons13[$i]!='' && $cartons13[$i]!='N/A')){ ?>
                          <li>
                           <div class="col-md-3"><input type="text" name="blend13[]" value="<?php echo $blends13[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code13[]" value="<?php echo $product_code13[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size13[]" value="<?php echo $ctn_size13[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities13[]" id="orderunit"  value="<?php echo $quantity13[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons13[]" value="<?php echo $cartons13[$i]; ?>" ></div>

                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 
// ------------------------------------Teapots----------------------------
                    $flag14 = false;
                    for($i=0;$i<=$org_count14;$i++){
                          if($quantity14[$i]!=''){ 
                            $flag14=true;
                            }
                        }
                     if($flag14){
                      
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Teapots</h3>
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
                        
                        <?php for($i=0;$i<=$org_count14;$i++){
                          if($quantity14[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3"><input type="text" name="blend14[]" value="<?php echo $blends14[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code14[]" value="<?php echo $product_code14[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size14[]" value="<?php echo $ctn_size14[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities14[]" id="orderunit"  value="<?php echo $quantity14[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons14[]" value="<?php echo $cartons14[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php } 

                 // -----------------------------Tea Tray Set-----------------------
                      $flag15 = false;
                    for($i=0;$i<=$org_count15;$i++){
                          if($quantity15[$i]!=''){ 
                            $flag15=true;
                            }
                        }
                     if($flag15){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Tea Tray Set</h3>
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
                        
                        <?php for($i=0;$i<=$org_count15;$i++){
                          if($quantity15[$i]!=''){ ?>
                          <li>
                           <div class="col-md-3"><input type="text" name="blend15[]" value="<?php echo $blends15[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code15[]" value="<?php echo $product_code15[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size15[]" value="<?php echo $ctn_size15[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities15[]" id="orderunit"  value="<?php echo $quantity15[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons15[]" value="<?php echo $cartons15[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php }  
              
              // ---------------------Tea Tray Set Replacement Accessories-----------------------
                      $flag16 = false;
                    for($i=0;$i<=$org_count16;$i++){
                          if($quantity16[$i]!=''){ 
                            $flag16=true;
                            }
                        }
                     if($flag16){
                    ?>
                  
                    
                    <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header" align="center">
                        <h3 class="box-title">Tea Tray Set Replacement Accessories</h3>
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
                        
                        <?php for($i=0;$i<=$org_count16;$i++){
                          if($quantity16[$i]!=''){ ?>
                          <li>
                           <div class="col-md-3"><input type="text" name="blend16[]" value="<?php echo $blends16[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code16[]" value="<?php echo $product_code16[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size16[]" value="<?php echo $ctn_size16[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities16[]" id="orderunit"  value="<?php echo $quantity16[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons16[]" value="<?php echo $cartons16[$i]; ?>" ></div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                     
                    </div>
                    <?php }  ?>
              </div>
            
              <!-- -------------------------------------------------- -->
   