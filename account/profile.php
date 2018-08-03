

<?php
include("../src/classes.php");
if(!isset($_SESSION['dev_user'])){
	echo "<script>window.open('../signin','_SELF')</script>";
}
$page_title= $log->_user('username');
include("../src/inc/_header.php");
?>
<link rel="stylesheet" type="text/css" href="profile.css"/>
<section id="content" style="margin-top: 150px;">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-4 col-xs-12">
				<div id="_profile_card"></div>
			</div>
    		<div class="col-md-8 col-sm-8 col-xs-12">
				<div id="_check_profile"></div>
					<div class="tabbable-panel">
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
							Overview </a>
						</li>
						<li>
							<a href="#contrib" data-toggle="tab">
							Tab 2 </a>
						</li>
						<li>
							<a href="#tab_default_3" data-toggle="tab">
							Tab 3 </a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<p style="font-weight: 700 !important; color: #000;">
								Popular Contrib
							</p>
							<div class="col-md-6 card">
								<a href="">Contrib name goes here</a><br>
								<p class="fa fa-users">Contributions&nbsp;&nbsp;<span  style="background-color: #868E96;"class="badge badge-success">10</span></p>
								<p class="fa fa-eye">Views&nbsp;&nbsp;<span  style="background-color: #868E96;"class="badge badge-success">10</span></p>
							</div>
						</div>
						<div class="tab-pane" id="contrib">
							<p>
								Howdy, I'm in Tab 2.
							</p>
							<p>
								Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
							</p>
							<p>
								<a class="btn btn-warning" href="http://j.mp/metronictheme" target="_blank">
									Click for more features...
								</a>
							</p>
						</div>
						<div class="tab-pane" id="tab_default_3">
							<p>
								Howdy, I'm in Tab 3.
							</p>
							<p>
								Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat
							</p>
							<p>
								<a class="btn btn-info" href="http://j.mp/metronictheme" target="_blank">
									Learn more...
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<div style="padding:10px; background-color: #6DBCE2; margin-top: 50px;" class="divider"></div>
<?php
include("../src/inc/_footer.php");
?>
<script src="../src/plugins/filter/filter.js"></script>
<script>
$(document).ready(function(){
	_profile_card();
	_check_profile();
});

function _check_profile(){
	$.ajax({
		type: "GET",
		url: "../src/function.php",
		data: {'function':'_check_profile'},
		dataType: "text",
		success: function(response){
			$("#_check_profile").html(response);
		}
	});
	
}
function _profile_card(){
	$.ajax({
		type: "GET",
		url: "../src/function.php",
		data: {'function':'_profile_card'},
		dataType: "text",
		success: function(response){
			$("#_profile_card").html(response);
		}
	});
}
</script>
