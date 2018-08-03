

<?php
include("../src/classes.php");
$page_title= "Create Contrib";
include("../src/inc/_header.php");
?>

<style>
a {
	cursor:pointer !important;
}

body {
	background-color: #f9f9f9;
}

label {
	font-weight: 900 !important;
	color: #000;
	font-size: 13px;
}
</style>
<section id="content" style="margin-top: 110px;">
	<link rel="stylesheet" type="text/css" href="../src/plugins/filter/filter.css"/>
<div id="banner-top" class="containter">
	<div class="row">
		<div class="col-md-6" style="padding: 20px; margin-left:10px;">
			<h1>Create a new contrib</h1>
			<p> A Contrib means a description of a project like post with a link to your source or your source code file, including the revision history. in other to draw contributors </p>
		</div>
	</div>
</div>

<!-- End of Banner -->
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-7">
			<div id="switch" style="padding:30px; background-color: #fff;">
				<form>
					<div class="col-md-12 form-group">
						<label>Contrib title</label>
						<input type="text" class="form-control" placeholder="contrib title"/>
					</div>
					<div class="col-md-12 form-group">
						<label>Description</label>
						<textarea class="form-control"></textarea>
					</div>
					<div class="col-md-12 form-group">
						<label><i class="fa fa-link"></i>&nbsp;Link</label>
						<input type="text" class="form-control">
					</div>
					<div class="col-md-12 form-group">
						<label>Source code</label>
						<input type="file" class="form-control">
					</div>
					<hr/>
					<div class="col-md-12 form-group">
						<label></label>
						<input type="radio" class=""/>Public<br>
						<input type="radio" class=""/>Private
					</div>
					<div class="col-md-12 form-group">
						<button style="color: #fff; font-weight:900;" class="btn btn-success">Create Contrib</button>
					</div>
				</form>
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
