<!DOCTYPE html>
<html lang="en">
<head>
  <title>I SAVED A SOUL</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">
  
  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-icons.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sliders.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

  <!-- Favicons -->
  <!--<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">-->
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon.html">
  <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114.png">

<?php wp_head(); ?>

</head>

<body class="relative">

  <!-- Preloader -->
  

  <main class="main-wrapper">

    <header class="nav-type-1">

      <!-- Fullscreen search -->
      <div class="search-wrap">
        <div class="search-inner">
          <div class="search-cell">
            <form method="get">
              <div class="search-field-holder">
                <input type="search" class="form-control main-search-input" placeholder="Search for">
                <i class="ui-close search-close" id="search-close"></i>
              </div>            
            </form>
          </div>
        </div>        
      </div> <!-- end fullscreen search -->
     
      <nav class="navbar navbar-static-top">
        <div class="navigation" >
          <div class="container relative">

            <div class="row flex-parent">

              <div class="navbar-header flex-child">
                <!-- Logo -->
                <div class="logo-container">
                  <div class="logo-wrap">
                    <a href="index.html">
                      <h4 style="color:#FFF;" class="logo_img">I SAVED A SOUL</h4>
                    </a>
                  </div>
                </div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Mobile cart -->
                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                  <div class="nav-cart-outer">
                    <div class="nav-cart-inner">
                      <a href="#" class="nav-cart-icon">
                        <span class="nav-cart-badge">2</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div> <!-- end navbar-header -->

              <div class="nav-wrap">
                <div class="collapse navbar-collapse text-center" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                  <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 4,
                'container'         => '',
                'container_class'   => '',
                'container_id'      => '',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>


                
                 <!--  

                    <li class="dropdown">
                      <a href="index.html">HOME</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>

                    <li class="dropdown">
                      <a href="#">FEATURES</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>

                    <li class="dropdown">
                      <a href="#">VIDEOS</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>

                    <li class="dropdown">
                      <a href="#">ACTION</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>

                    <li class="dropdown">
                      <a href="#">BLOG</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>
                    <li class="dropdown">
                      <a href="#">ISSUES</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>
                    <li class="dropdown">
                      <a href="#">LIVING</a>
                      <i class="fa fa-angle-down dropdown-trigger"></i>
                      
                    </li>  <! end elements -->

                    
      
                    <!-- Mobile search -->
                    <li id="mobile-search" class="hidden-lg hidden-md">
                      <form method="get" class="mobile-search">
                        <input type="search" class="form-control" placeholder="Search...">
                        <button type="submit" class="search-button">
                          <i class="fa fa-search"></i>
                        </button>
                      </form>
                    </li>

                  </ul> <!-- end menu -->
                </div> <!-- end collapse -->
              </div> <!-- end col -->

              
          
            </div> <!-- end row -->
          </div> <!-- end container -->
        </div> <!-- end navigation -->
      </nav> <!-- end navbar -->
    </header>
