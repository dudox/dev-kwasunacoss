<?php 
include("../src/classes.php");
$page_title = "Topics";
include("../src/inc/_header.php");
?>
<link rel="stylesheet" type="text/css" href="../codepen.css"/>
<style>
label {
	font-weight: 900 !important;
	color: #000;
	font-size: 13px;
}

body {
	background-color: #f9f9f9;
}

.card {
	margin: 5px !important;
}
</style>
<section style="margin-top: 130px;">
	<div class="container">
		<div class="col-md-12">
			<div id="banner"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php 
					if(!isset($_SESSION['dev_user'])){
				?>
				<div class="alert alert-info alert-dismissable row align-items-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<strong style="font-weight:900;">Get Started</strong>&nbsp;&nbsp;&nbsp;Post topics just like this to get feedbacks from other developers, get started by signin in 
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<a style="color: #fff; font-weight: 800; " href="../signin" class="btn btn-success"><i class="fa fa-log-in"></i>&nbsp;Sign in</a>
					</div>
				</div>
				<?php } else {?>
				<div class="alert alert-info alert-dismissable row align-items-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<strong style="font-weight:900;">Tips</strong>&nbsp;&nbsp;&nbsp;Post a topic now and get solutions with ease on our open source community
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<a style="color: #fff; font-weight: 800; " href="../topic/new" class="btn btn-primary"><i class="fa fa-log-in"></i>&nbsp;Post a topic</a>
					</div>
				</div>
				<?php }?>
			</div>
			<div class=" col-md-12">
				<div class="row" id="content"></div>
				<div class="row justify-content-center" id="pager"></div>
			</div>
			<div class="row col-md-12">
				
			</div>
		</div>
	</div>
</section>
<br><br>
<?php 
include("../src/inc/_footer.php");
?>
<script src="lib/js/allpost.js"></script>
