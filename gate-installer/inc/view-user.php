<?php 
error_reporting(0);
$user_id = $_GET['user_id']; 
$author_obj = get_user_by('id', $user_id);
//var_dump($author_obj);
$img = get_user_meta($user_id, 'picture', true);
// $img = ($img)? $img['url']: 'https://site.goigi.co/egates/wp-content/uploads/2018/05/No_Image_Available.jpg';
$img = ($img)? $img['url']: 'https://site.goigi.co/egates/wp-content/uploads/2018/05/NoImage-180x180.jpg';
$business_name = get_user_meta($user_id, 'business_name', true);
$register_phone = get_user_meta($user_id, 'register_phone', true);
$register_phone2 = get_user_meta($user_id, 'register_phone2', true);
$state = get_user_meta($user_id, 'state', true);
$city = get_user_meta($user_id, 'city', true);
$service = get_user_meta($user_id, 'service', true);
$certificate = get_user_meta($user_id, 'certificate', true);
?>
<body>
  <div class="container">
    <div class="panel-group">
      <div class="panel panel-default" style="padding: 7px;">
        <div class="panel-heading">
          <div class="fb-profile">
            <img align="left" class="fb-image-lg" src="https://site.goigi.co/egates/wp-content/uploads/2018/04/page_bg1.png" alt="Profile image example"/>
            <img align="left" class="fb-image-profile thumbnail" src="<?php echo $img;?>" alt="Profile image example"/>
            <div class="fb-profile-text">
              <h1>
                <?php echo $author_obj->display_name;?>
              </h1>
              <h4> 
                <span class="fa fa-envelope-o">
                </span> &nbsp;&nbsp;
                <?php echo $author_obj->user_email;?>
              </h4>
            </div>
          </div>
        </div>
        <br>
        <div class="clearfix">
        </div>
        <!-- <div style="padding: 0px 50px 0px 50px;"> -->
        <div class="row">
          <div class="col-md-6">    
            <div class="panel-group">
              <div class="panel panel-primary">
                <div class="panel-heading">Business Name
                </div>
                <div class="panel-body">
                  <?php echo $business_name;?>
                </div>
              </div>
              <div class="panel panel-success">
                <div class="panel-heading">Contact No.
                </div>
                <div class="panel-body">
                  <?php echo $register_phone;?>
                </div>
              </div>
              <div class="panel panel-info">
                <div class="panel-heading">Alternate No.
                </div>
                <div class="panel-body">
                  <?php echo $register_phone2;?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="panel-group">
              <div class="panel panel-warning">
                <div class="panel-heading">State
                </div>
                <div class="panel-body">
                  <?php echo $state;?>
                </div>
              </div>
              <div class="panel panel-danger">
                <div class="panel-heading">City
                </div>
                <div class="panel-body">
                  <?php echo $city;?>
                </div>
              </div> 
              <div class="panel panel-default">
                <div class="panel-heading">Service
                </div>
                <div class="panel-body">
                  <?php echo $state;?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a type="button" class="btn btn-info" href="<?php echo ($certificate) ? $certificate['url']:'';?> ">
          <i class="fa fa-file-pdf-o">
          </i> &nbsp; Certificate &nbsp; 
          <i class="fa fa-download">
          </i>
        </a>
        <!-- </div> -->
      </div>
    </div>
  </div> 
  <!-- /container -->  
</body>
