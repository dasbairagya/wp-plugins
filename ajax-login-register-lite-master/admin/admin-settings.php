		<div class="wrap">
		  <h1><um>Ajax Login Register Lite Settings :</um></h1>
		   <?php settings_errors(); ?>
			   <div class="row">
				 <div class="col-md-7">
				  <form method="post" action="options.php">
				    <?php settings_fields( 'ajax-login-register-lite-settings-group' ); ?>
				    <?php do_settings_sections( 'ajax-login-register-lite-settings-group' ); ?>
				    <table class="form-table">
				      <tr valign="top">
				        <th scope="row">Registration success message
				        </th>
				        <td>
				          <input type="text" name="reg_success_msg" value="<?php echo esc_attr( get_option('reg_success_msg') ); ?>" />
				        </td>
				      </tr>

				      <tr valign="top">
				        <th scope="row">Login success message
				        </th>
				        <td>
				          <input type="text" name="log_success_msg" value="<?php echo esc_attr( get_option('log_success_msg') ); ?>" />
				        </td>
				      </tr>
				        <tr valign="top">
				          <th scope="row">Redirect page after login</th>
				          <td>
				          <?php
							$login_redirect_page_id = (int) get_option( 'login_redirect' );
							$has_pages = (bool) get_posts( array(
								'post_type' => 'page',
								'posts_per_page' => 1,
								'post_status' => array(
									'publish',
									'draft',
								),
							) );

							if ( $has_pages ) : ?>
								
									
									<?php
									wp_dropdown_pages(
										array(
											'name'              => 'login_redirect',
											'show_option_none'  => __( '&mdash; Select &mdash;' ),
											'option_none_value' => '0',
											'selected'          => $login_redirect_page_id,
											'post_status'       => array( 'draft', 'publish' ),
										)
									);

									
									?>
									<label for="add-shortcode">
										[<?php _e( 'Select an existing page' ); ?>]
									</label>
							<?php endif; ?>
						</td>
				        <!--   <td>
				        <input type="text" name="login_redirect" value="<?php echo esc_attr( get_option('login_redirect') ); ?>" placeholder=" eg. https://example.com/profile" />   
				          </td> -->
				      </tr>
				       <tr valign="top">
				          <th scope="row">Redirect url after logout</th>

				          <td>
				          <?php
							$logout_redirect_page_id = (int) get_option( 'logout_redirect' );
							$has_pages = (bool) get_posts( array(
								'post_type' => 'page',
								'posts_per_page' => 1,
								'post_status' => array(
									'publish',
									'draft',
								),
							) );

							if ( $has_pages ) : ?>
								
									
									
									<?php
									wp_dropdown_pages(
										array(
											'name'              => 'logout_redirect',
											'show_option_none'  => __( '&mdash; Select &mdash;' ),
											'option_none_value' => '0',
											'selected'          => $logout_redirect_page_id,
											'post_status'       => array( 'draft', 'publish' ),
										)
									);

									
									?>
									<label for="add-shortcode">
										[<?php _e( 'Select an existing page' ); ?>]
									</label>
							<?php endif; ?>
						</td>
				          <!-- <td>
				        <input type="text" name="logout_redirect" value="<?php echo esc_attr( get_option('logout_redirect') ); ?>" placeholder=" eg. https://example.com" />   
				          </td> -->
				      </tr>

				      <tr valign="top">
				        <th scope="row">Upload Logo
				        </th>
				        <td>
				          <?php 
				          $default_logo_image = plugins_url('../assets/images/demo-logo.png', __FILE__);
				          $this->admin_image_uploader( 'logo_image', $width = 190, $height = 'auto', $default_logo_image  ) ?>
				        </td>
				      </tr> 
				     
				      <tr valign="top">
				        <th scope="row">Logo height
				        </th>
				        <td>
				          <input type="text" name="alrl_logo_height" value="<?php echo esc_attr( get_option('alrl_logo_height') ); ?>" placeholder=" eg. 170" />
				        </td>
				      </tr>
				      <tr valign="top">
				        <th scope="row">Logo width
				        </th>
				        <td>
				          <input type="text" name="alrl_logo_width" value="<?php echo esc_attr( get_option('alrl_logo_width') ); ?>" placeholder=" eg. 170" />
				        </td>
				      </tr>
				       <tr valign="top">
				          <th scope="row">Show background image</th>
				          <td>
				          	<label class="switch">
				        <input type="checkbox" onchange="valueChanged();" id="bgclick" name="toggle_background_image" value="yes" <?php echo (get_option('toggle_background_image') == 'yes')?'checked="checked"':'' ?>> 
				        <span class="slider round"></span>   
				        </label>
				          </td>
				      </tr>
				      
				        <tr valign="top" id="alrlbg" style="display: <?php echo $display = (get_option('toggle_background_image') == 'yes') ? 'table-row' : 'none'; ;?>">
				        <th scope="row">Background image</th>
				        <td>
				          <?php 
				          $default_background_image = plugins_url('../assets/images/pumpkins-creative.jpg', __FILE__);
				          $this->admin_image_uploader( 'alrl_background', $width = 350, $height = 180, $default_background_image ); ?>
				        </td>
				      </tr> 
				      <tr valign="top">
				          <th scope="row">Enable email activation</th>
				          <td>
				          	<label class="switch">
				        <input type="checkbox" name="alrl_email_activation" value="yes" <?php echo (get_option('alrl_email_activation') == 'yes')?'checked="checked"':'' ?>> 
				        <span class="slider round"></span>   
				        </label>
				          </td>
				      </tr>

				      <tr valign="top">
				          <th scope="row">Enable cookies</th>
				          <td>
				        <input type="checkbox" name="alrl_cookies" value="yes" <?php echo (get_option('alrl_cookies') == 'yes')?'checked="checked"':'' ?>>    
				          </td>
				      </tr>

				      <tr>
						<th scope="row"><label for="default_role"><?php _e('New User Default Role') ?></label></th>
						<td>
						<select name="default_role" id="default_role"><?php wp_dropdown_roles( get_option('default_role') ); ?></select>
						</td>
						</tr>
				      
				    </table>
				    <?php submit_button(); ?>
				  </form>
				</div>
				<div class="col-md-5">
				  <div class="panel-group">
				     <div class="panel panel-info">
				      <div class="panel-heading">Copy the below shortcodes</div>
				      <div class="panel-body">
				      	<ol>
				      		<li><h4>Login/Register Form : <strong>[alrl-login-register-lite]</strong></h4></li>
				      		<li><h4>Profile Builder : <strong>[alrl-profile-lite]</strong></h4></li>

				      	</ol>
				      	
				      	
				      </div>
				      
				    </div>
				  </div>
				  <div class="panel-group">
				     <div class="panel panel-info">
				      <div class="panel-heading">Preview</div>
				      <div class="panel-body"><?php echo do_shortcode('[alrl-login-register-lite]');?></div>
				    </div>
				  </div>

				</div>
			</div>
		</div>