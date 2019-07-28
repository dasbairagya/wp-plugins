<div class="tab-pane zeotic" id="tab_3">
                    <h1><b>ORDER FORM: ZOETIC RETAIL PRODUCTS</b></h1>
                    <?php
// ------------------------------------25 Tea Bags Box----------------------------
                   $flag17=false; 
                    for($i=0;$i<=$org_count17;$i++){
                          if($quantity17[$i]!=''||$cartons17[$i]!=''){ 
                            $flag17=true;
                            }
                        }
                      /**********genereate the tab_1 content if data exits*******/
                     if($flag17){ 
                      // echo $flag8;
                    ?>
                    <div class="col-md-12 ordercolumnhalf">
                       <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">25 Tea Bags Box</h3>

                        <h4><b>( 1Box= 25 Tea bags, 1 Carton = 18x 25 tea bag boxes )</b></h4>
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
                        <?php for($i=0;$i<=$org_count17;$i++){
                          if($quantity17[$i]!=''||$cartons17[$i]!=''){ ?>
                           <li>

                           <div class="col-md-3"><input type="text" name="blend17[]" value="<?php echo $blends17[$i];?>" readonly> </div>
                          <div class="col-md-3"><input type="text" size="" name="product_code17[]" value="<?php echo $product_code17[$i];?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size17[]" value="<?php echo $ctn_size17[$i];?>" readonly></div>
                          <div class="col-md-2">
                            <input name="quantities17[]" id="orderunit"  value="<?php echo $quantity17[$i];?>" type="text" size="4" placeholder="0" />
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons17[]" value="<?php echo $cartons17[$i];?>" placeholder="0"></div>

                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                      </div>
                  
                    <?php } 
                    // ----------------------100 Pyramid Tea Bags Box----------------------------
                      $flag18 = false;
                    for($i=0;$i<=$org_count18;$i++){
                          if($quantity18[$i]!=''||$cartons18[$i]!=''){ 
                            $flag18=true;
                            }
                        }
                     if($flag18){
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
                        
                        <?php for($i=0;$i<=$org_count18;$i++){
                          if($quantity18[$i]!=''||$cartons18[$i]!=''){ ?>
                          
                        <li>
                           <div class="col-md-3"><input type="text" name="blend18[]" value="<?php echo $blends18[$i]; ?>" readonly></div>
                          <div class="col-md-3"><input type="text" name="product_code18[]" value="<?php echo $product_code18[$i]; ?>" readonly></div>
                          <div class="col-md-2"><input type="text" size="4" name="ctn_size18[]" value="<?php echo $ctn_size18[$i]; ?>"></div>
                          <div class="col-md-2">
                            <input name="quantities18[]" id="orderunit"  value="<?php echo $quantity18[$i]; ?>" type="text" size="4" placeholder="0">
                          </div>
                           <div class="col-md-2"><input type="text" size="4" name="cartons18[]" value="<?php echo $cartons18[$i]; ?>" placeholder="0" ></div>
                        </li>
                       <?php  }//end if
                          }//end for
                          ?>
                          
                        </ul>
                      
                    </div>
                    <?php }   
               // ----------------------Other-----------------------
                      $flag19 = false;
                    for($i=0;$i<=$org_count19;$i++){
                          if($quantity19[$i]!=''){ 
                            $flag19=true;
                            }
                        }
                     if($flag19){
                    ?>
                  
                    
                   <div class="col-md-12 ordercolumnhalf">
                      <div class="box-header zeotic-header" align="center">
                        <h3 class="box-title">Other</h3>
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
                        
                        <?php for($i=0;$i<=$org_count19;$i++){
                          if($quantity19[$i]!=''){ ?>
                            <li>
                           <div class="col-md-3">
                           <input type="text" name="blend19[]" value="<?php echo $blends19[$i]; ?>" readonly>
                           </div>
                          <div class="col-md-3">
                          <input type="text" name="product_code19[]" value="<?php echo $product_code19[$i]; ?>" readonly>
                          </div>
                          <div class="col-md-2">
                          <input type="text" size="4" name="ctn_size19[]" value="<?php echo $ctn_size19[$i]; ?>">
                          </div>
                          <div class="col-md-2">
                            <input name="quantities19[]" id="orderunit"  value="<?php echo $quantity19[$i]; ?>" type="text" size="4">
                          </div>
                           <div class="col-md-2">
                           <input type="text" size="4" name="cartons19[]" value="<?php echo $cartons19[$i]; ?>">
                           </div>
                        </li>
                       <?php  }//end if
                          }//end for?>
                          
                        </ul>
                 
                    </div>
                    <?php } ?>
            </div>
              <!-- -------------------------------------------------- -->
   