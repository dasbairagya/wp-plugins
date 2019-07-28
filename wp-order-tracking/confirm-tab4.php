<div class="tab-pane zeotic" id="tab_4">
                   <h1><b>ORDER FORM: ZOETIC FOOD SERVICE PRODUCTS</b></h1>
                    <?php
// ------------------------------------100 Tea Bags Box----------------------------
                   $flag20=false; 
                    for($i=0;$i<=$org_count20;$i++){
                          if($quantity20[$i]!=''||$cartons20[$i]!=''){ 
                            $flag20=true;
                            }
                        }
                      /**********genereate the tab_1 content if data exits*******/
                     if($flag20){ 
                      // echo $flag8;
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                        <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">100 Tea Bags Box</h3>
                        <h4><b>(1Box= 100 Tea bags, 1 Carton = 6x 100 tea bag boxes)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        <?php for($i=0;$i<=$org_count20;$i++){
                          if($quantity20[$i]!=''||$cartons20[$i]!=''){ ?>
                           <li>

                           <div class="col-md-3"><input type="text" name="blend20[]" value="<?php echo $blends20[$i];?>" readonly> </div>
                          <div class="col-md-3"><input type="text" size="" name="product_code20[]" value="<?php echo $product_code20[$i];?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size20[]" value="<?php echo $ctn_size20[$i];?>" readonly></div>
                          <div class="col-md-2">
                            <input name="quantities20[]" id="orderunit"  value="<?php echo $quantity20[$i];?>" type="text" size="4" placeholder="0" />
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons20[]" value="<?php echo $cartons20[$i];?>" placeholder="0"></div>

                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                      </div>
                  
                    <?php } 
                    // ----------------------100 Enveloped Tea Bags Box---------------------------
                      $flag21 = false;
                    for($i=0;$i<=$org_count21;$i++){
                          if($quantity21[$i]!=''||$cartons21[$i]!=''){ 
                            $flag21=true;
                            }
                        }
                     if($flag21){
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">100 Enveloped Tea Bags Box</h3>
                        <h4><b>(1Box= 100 Tea bags, 1 Carton = 6x 100 tea bag boxes)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                        <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count21;$i++){
                          if($quantity21[$i]!=''||$cartons21[$i]!=''){ ?>
                          
                        <li>
                           <div class="col-md-3"><input type="text" name="blend21[]" value="<?php echo $blends21[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code21[]" value="<?php echo $product_code21[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size21[]" value="<?php echo $ctn_size21[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities21[]" id="orderunit"  value="<?php echo $quantity21[$i]; ?>" type="text" size="4" placeholder="0">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons21[]" value="<?php echo $cartons21[$i]; ?>" placeholder="0" ></div>
                        </li>
                       <?php  }//end if
                          }//end for
                          ?>
                          
                        </ul>
                      
                    </div>
                    <?php }   
               // ----------------------1000 Tea Bags Catering Box----------------------
                      $flag22 = false;
                    for($i=0;$i<=$org_count22;$i++){
                          if($quantity22[$i]!=''){ 
                            $flag22=true;
                            }
                        }
                     if($flag22){
                    ?>
                   <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">1000 Tea Bags Catering Box</h3>
                       
                      </div>
                      <!-- /.box-header -->

                      <ul>
                         <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count22;$i++){
                          if($quantity22[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend22[]" value="<?php echo $blends22[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code22[]" value="<?php echo $product_code22[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size22[]" value="<?php echo $ctn_size22[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities22[]" id="orderunit"  value="<?php echo $quantity22[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons22[]" value="<?php echo $cartons22[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>

                    <?php } 
                    // ----------------------1000 Enveloped Tea Bags Catering Box---------------------
                      $flag23 = false;
                    for($i=0;$i<=$org_count23;$i++){
                          if($quantity23[$i]!=''){ 
                            $flag23=true;
                            }
                        }
                     if($flag23){
                    ?>
                   <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">1000 Enveloped Tea Bags Catering Bo3</h3>
                       
                      </div>
                      <!-- /.box-header -->

                      <ul>
                         <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count23;$i++){
                          if($quantity23[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend23[]" value="<?php echo $blends23[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code23[]" value="<?php echo $product_code23[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size23[]" value="<?php echo $ctn_size23[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities23[]" id="orderunit"  value="<?php echo $quantity23[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons23[]" value="<?php echo $cartons23[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } 
                     // ----------------------1 Kg Resealable Pouch---------------------
                      $flag24 = false;
                    for($i=0;$i<=$org_count24;$i++){
                          if($quantity24[$i]!=''|| $cartons24[$i]!=''){ 
                            $flag24=true;
                            }
                        }
                     if($flag24){
                    ?>
                   <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">1 Kg Resealable Pouch</h3>
                        <h4><b>(1 Carton = 4x1Kg pouches)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                         <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count24;$i++){
                          if($quantity24[$i]!=''|| $cartons24[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend24[]" value="<?php echo $blends24[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code24[]" value="<?php echo $product_code24[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size24[]" value="<?php echo $ctn_size24[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities24[]" id="orderunit"  value="<?php echo $quantity24[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons24[]" value="<?php echo $cartons24[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } 
                      // ----------------------Display Tin---------------------
                      $flag25 = false;
                    for($i=0;$i<=$org_count25;$i++){
                          if($quantity25[$i]!=''|| $cartons25[$i]!=''){ 
                            $flag25=true;
                            }
                        }
                     if($flag25){
                    ?>
                   <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">Display Tin</h3>

                        <h4><b>(1Carton = 6 Tins)</b></h4>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                         <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count25;$i++){
                          if($quantity25[$i]!=''|| $cartons25[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend25[]" value="<?php echo $blends25[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code25[]" value="<?php echo $product_code25[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size25[]" value="<?php echo $ctn_size25[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities25[]" id="orderunit"  value="<?php echo $quantity25[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons25[]" value="<?php echo $cartons25[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } 
                     // ---------------------Other---------------------
                      $flag26 = false;
                    for($i=0;$i<=$org_count26;$i++){
                          if($quantity26[$i]!=''){ 
                            $flag26=true;
                            }
                        }
                     if($flag26){
                    ?>
                   <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">Other</h3>
                      </div>
                      <!-- /.box-header -->

                      <ul>
                         <li class="headingorderli zeoticli">
                          <div class="col-md-3"><strong>Blend</strong></div>
                          <div class="col-md-3"><strong>Product Code</strong></div>
                          <div class="col-md-2"><strong>CTN Size</strong></div>
                          <div class="col-md-2"><strong>ORDER UNITS</strong></div>
                          <div class="col-md-2"><strong>ORDER CARTONS</strong></div>
                        </li>
                        
                        <?php for($i=0;$i<=$org_count26;$i++){
                          if($quantity26[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend26[]" value="<?php echo $blends26[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code26[]" value="<?php echo $product_code26[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size26[]" value="<?php echo $ctn_size26[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities26[]" id="orderunit"  value="<?php echo $quantity26[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons26[]" value="<?php echo $cartons26[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } ?>


            </div>
              <!-- -------------------------------------------------- -->
   