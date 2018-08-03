

<?php
include("../src/classes.php");
if(!isset($_SESSION['dev_user'])){
	echo "<script>window.open('../signin','_SELF')</script>";
}
$page_title= "My Account";
include("../src/inc/_header.php");
?>
<style>
a {
	cursor:pointer !important;
}
</style>
<section id="content" style="margin-top: 110px;">
	<link rel="stylesheet" type="text/css" href="../src/plugins/filter/filter.css"/>
<div id="banner-top" class="containter">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="alert alert-info" style="padding:30px;">
				<h1>Learn, Unlearn and Relearn</h1>
				<p>Become a part of a very large movement, Post projects and source codes to get reviews from Nacossites</p>
				<a style="background-color: #f9f9f9; color: #000; font-weight:900; margin:5px;" class="btn btn-default"><i class="fa fa-github-alt fa-lg"></i>&nbsp;&nbsp;Explore</a>
				<a href="./new" style="color: #fff; font-weight:900; margin: 5px;" class="btn btn-success "><i class="fa fa-plus-circle fa-lg"></i>&nbsp;&nbsp;Add Contrib</a>
			</div>
		</div>
	</div>
</div>
<!-- End of Banner -->
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-3">
			<div class="card">
				<div style="padding:10px; background-color: #f9f9f9;">
					<span class="pull-right" ><a class="btn btn-success" style="font-weight: 800; font-size: 13px; color: #fff;">New Projects</a></span>
					<span class="pull-left" style="font-weight: 800; font-size: 13px;">Projects</span>
				</div>
				<div class="panel-body">
					<div class="col-lg-12 col-md-12" style="margin-top: 5px;">
						<input type="search" class="form-control pb_height-50" id="input-search" placeholder="Search Projects" >
					</div>
					<div class="searchable-container">
						<div class="col-md-12">
							<div class="row" style="line-height: .8em; padding:10px;">
								<div class="items col-md-12">
									<p><a href="#" style="font-weight:900; font-size:13px;"><i class="fa fa-book"></i>&nbsp;Development</a></p>
								</div>
								<div class="items col-md-12">
									<p><a href="#" style="font-weight:900; font-size:13px;"><i class="fa fa-book"></i>&nbsp;Java</a></p>
								</div>
								<div class="items col-md-12">
									<p><a href="#" style="font-weight:900; font-size:13px;"><i class="fa fa-book"></i>&nbsp;Angular</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<span class="pull-right" ><a href="#" style="font-weight: 800; font-size: 13px;">Discover projects</a></span>
			<span class="pull-left" style="font-weight: 800; color: #000; font-size: 13px;">Activity</span><br>
			<hr>
			<div class="card">
				<div class="card-body">
					<h4 style="font-weight:900 !important;">Discover interesting projects and people to populate your personal news feed.</h4>
					<p>Your news feed helps you keep up with recent activity on repositories you watch and people you follow. </p>
					<a style="background-color: #f9f9f9; color: #000; font-weight:900; margin:5px;" class="btn btn-default"><i class="fa fa-github-alt fa-lg"></i>&nbsp;&nbsp;Explore</a>
				</div>
			</div>
		</div>
		
	</div>
</div>
</section>
<div style="padding:10px; background-color: #6DBCE2; margin-top: 20px;" class="divider"></div>
<?php
include("../src/inc/_footer.php");
?>
<script src="../src/plugins/filter/filter.js"></script>
<script>
$(document).ready(function(){
	_dl_();
	$("#loader").delay(3000).fadeOut(function(){
		$("#body-call").load("_file/briefcase.php",'#body-call').hide().fadeIn();
	});
	
   $('[data-toggle="offcanvas"]').click(function(){
       $("#navigation").toggleClass("hidden-xs");
   });
});

  function pager(collector,source,_this){
		$("#body-call").hide().fadeOut(0);
		$('li.active').removeClass('active');
		_dl_();	
		$("#loader").show();
		$("#loader").delay(3000).fadeOut(0,function(){
			$("#body-call").load(source + collector+".php","#body-call").hide().delay(500).fadeIn(0);
			window.history.pushState(collector, collector,"");
		});
		var cl = $(_this);
		cl.parent().addClass('active');
   }
   
   function _dl_(){
		$.ajax({
		   type: "POST",
		   url: "src/function.php",
		   data: {
			 'function':'_dl_'
		   },
		   dataType: "text",
		   success: function(response){
			   $("#_dl_").html(response);
		   }
		});  
	}
	function goSingle(__this__,__page__,secretKey,__status__){
		var curr = $(__this__);
		$("#body-call").hide().fadeOut(0);
		_dl_();	
		$("#loader").show();
		$("#loader").delay(3000).fadeOut(0,function(){
			$("#body-call").load("_file/single.php?" + $.param({'function': '_dl_service','code':secretKey, 'type': __page__,'status':__status__}),"#body-call").hide().delay(500).fadeIn(0);
		});
	}
</script>
