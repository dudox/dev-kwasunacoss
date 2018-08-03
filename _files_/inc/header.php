
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title><?php echo $page_title;?></title>
		<meta name="description" content="Free Bootstrap 4 Template by uicookies.com">
		<meta name="keywords" content="Free website templates, Free bootstrap themes, Free template, Free bootstrap, Free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

		<link rel="stylesheet" href="../../lib/assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../lib/assets/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../../lib/assets/fonts/law-icons/font/flaticon.css">

    <link rel="stylesheet" href="../../lib/assets/fonts/fontawesome/css/font-awesome.min.css">
    
    
    <link rel="stylesheet" href="../../lib/assets/css/slick.css">
    <link rel="stylesheet" href="../../lib/assets/css/slick-theme.css">

    <link rel="stylesheet" href="../../lib/assets/css/helpers.css">
    <link rel="stylesheet" href="../../lib/assets/css/style.css">
    <link rel="stylesheet" href="../../lib/assets/css/landing-2.css">
	</head>
	<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">
<style>
nav.pb_scrolled-light {
	color: #000;
}
</style>
    <nav style="background-color: #fff;" class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
      <div class="container">
      <div class="row">
			  <div class="col-md-6 col-xs-9 col-sm-6">
				<p><img src="src/lib/assets/images/brand/ingressive.png"/ class="img-fluid"></p>
			</div>
			<div class="col-md-6 col-xs-3 col-sm-6 push-right">
				<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
			  <span><i class="ion-navicon"></i></span>
			</button>
			</div>
      </div>
        <?php if(!isset($_SESSION['dev_user'])){?>
        <div class="collapse navbar-collapse" id="probootstrap-navbar">
          <ul class="navbar-nav ml-auto" style="font-weight: 400;">
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="./">Home&nbsp;<i style="color:#000;" class="fa fa-home"></i></a></li>
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="index">Topics&nbsp;<i style="color:#000;" class="fa fa-link"></i></a></li>
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="#section-faq"><span class="pb_rounded-4">Contest&nbsp;<i style="color: #000;" class="fa fa-lg fa-trophy "></i></span></a></li>
            <li  style="color: #000;"class="nav-item"><a class="nav-link" href="signin"><span class="" >Sign in&nbsp;<i style="color: #000;" class="fa fa-lg fa-github"></i></span></a></li>
          </ul>
        </div>
        <?php } else {?>
		<div class="collapse navbar-collapse" id="probootstrap-navbar">
          <ul class="navbar-nav ml-auto" style="font-weight: 400;">
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="./../../../">Home&nbsp;<i style="color:#000;" class="fa fa-home"></i></a></li>
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="index">Topics&nbsp;<i style="color:#000;" class="fa fa-link"></i></a></li>
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="#section-faq"><span class="pb_rounded-4">Comminity&nbsp;<i style="color: #000;" class="fa fa-lg fa-users"></i></span></a></li>
            <li class="nav-item"><a style="color: #000;" class="nav-link" href="#section-faq"><span class="pb_rounded-4">Contest&nbsp;<i style="color: #000;" class="fa fa-lg fa-trophy "></i></span></a></li>
            <li  style="color: #000;"class="nav-item"><a class="nav-link" href="signin"><span class="" ><?php echo $log->_user('username');?>&nbsp;<i style="color: #000;" class="fa fa-lg fa-github"></i></span></a></li>
          </ul>
        </div>
		<?php }?>
      </div>
    </nav>
    <!-- END nav -->
