<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public/spicyX/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?= $title?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">    
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">    
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>        
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>  
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="mu-preloader">
      <img src="assets/img/preloader.gif" alt=" loader img">
    </div>
  </div>
  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
    </a>
  <!-- END SCROLL TOP BUTTON -->
  <!-- Start header section -->
  <header id="mu-header">  
    <nav class="navbar navbar-default mu-main-navbar <?= (isset($header_hold) and ($header_hold == TRUE))?'navbar-bg-hold':'' ?>" role='navigation'>
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                                        
          <a class="navbar-brand" href="<?= PATH_INDEX ?>"><img src="assets/img/logo1.png" width="154" height="100" alt="Logo img"></a> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
            <li><a href="<?= PATH_INDEX ?>">HOME</a></li>
            <li><a href="<?= PATH_INDEX ?>?c=order">VENDORS</a></li>
            <?php if ($_SESSION['role'] === 0): ?>
            <li><a href="<?= PATH_INDEX ?>?c=management">MANAGEMENT</a></li>
            <?php endif;?>
            <li><a href="<?= PATH_INDEX ?>?c=load_page&page=about_us">ABOUT US</a></li>
            <li><a href="<?= PATH_INDEX ?>?c=load_page&page=our_team">OUR TEAM</a></li>
            <li><a href="<?= PATH_INDEX ?>?c=load_page&page=contact">CONTACT</a></li>
            <?php if (isset($_SESSION['role']) and ($_SESSION['role'] === 2 or $_SESSION['role'] === 3)): ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="blog-archive.html">MY STORE<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">                
                <li><a href="<?= PATH_INDEX ?>?c=bill&a=getBillCook">View Order</a></li>  
                <li><a href="<?= PATH_INDEX ?>?c=modify_menu">Modify Menu</a></li>                                          
              </ul>
            </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['role'])): ?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="blog-archive.html"><?= htmlspecialchars($header['user']['fullname'], ENT_QUOTES, 'UTF-8'); ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">                
                <li><a href="<?= PATH_INDEX ?>?c=info">Profile</a></li>
                <li><a href="<?= PATH_INDEX ?>?c=bill&a=getBillCustomer ">Order History</a></li>
                <li><a href="<?= PATH_INDEX ?>?c=update">Account</a></li>
                <li><a href="<?= PATH_INDEX ?>?c=logout">Logout</a></li>                                            
              </ul>
            </li>
            <?php else: ?>
            <li><a href="<?= PATH_INDEX ?>?c=signup">SIGN UP</a></li>
            <li><a href="<?= PATH_INDEX ?>?c=login">LOGIN</a></li> 
            <?php endif;?>
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </header>
  <!-- End header section -->
 