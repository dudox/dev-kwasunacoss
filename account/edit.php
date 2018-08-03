

<?php
include("../src/classes.php");
$page_title= "Edit - ".$_SESSION['dev_user'];
include("../src/inc/_header.php");
?>
<link rel="stylesheet" type="text/css" href="../src/plugins/dashTs/editPage.css"/>
<section id="content" style="margin-top: 150px;">
	<link rel="stylesheet" type="text/css" href="../src/plugins/filter/filter.css"/>
<!-- End of Banner -->
<div class="container">
	<div class="row ">
		<div class="col-md-12 hidden-xs hidden-sm">
			<div class="hidden-xs hidden-sm" id="_msg"></div>
		</div>
		 <div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="vtabs ">
						<ul class="nav nav-tabs tabs-vertical" role="tablist">
							<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home8" role="tab"><span class="hidden-lg"><i class="fa fa-feed"></i></span><span class="word hidden-xs"><i class="fa fa-feed">&nbsp;&nbsp;</i>Feeds</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home9" role="tab"><span class="hidden-lg"><i class="fa fa-user"></i></span><span class="word hidden-xs"><i class="fa fa-user-circle">&nbsp;&nbsp;</i>Personal info</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages9" role="tab"><span class="hidden-lg"><i class="fa fa-github-alt"></i></span><span class="word hidden-xs"><i class="fa fa-github-alt">&nbsp;&nbsp;</i>Contrib</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile9" role="tab"><span class="hidden-lg"><i class="fa fa-image"></i></span><span class="word hidden-xs"><i class="fa fa-image">&nbsp;&nbsp;</i>Profile Picture</span></a> </li>
							<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile10" role="tab"><span class="hidden-lg"><i class="fa fa-key"></i></span><span class="word hidden-xs"><i class="fa fa-key">&nbsp;&nbsp;</i>Change Password</span></a> </li>
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="home8" role="tabpanel">
								<div id="_feed_r"></div>
							</div>
							<div class="tab-pane" id="home9" role="tabpanel">
								<div id="_personal"></div>
								<div id="col-md-12 hidden-lg hidden-md">
									<div  class="hidden-lg hidden-md" id="_b_msg"></div>
								</div>
							</div>
							<div class="tab-pane p-20" id="messages9" role="tabpanel">
								<div id="_p_contrib"></div>
								<div id="col-md-12 hidden-lg hidden-md">
									<div  class="hidden-lg hidden-md" id="_c_msg"></div>
								</div>
							</div>
							<div class="tab-pane  p-20" id="profile9" role="tabpanel">
								<div id="_pp"></div>
							</div>
							<div class="tab-pane  p-20" id="profile10" role="tabpanel">
								<div id="_p_password"></div>
								<div id="col-md-12 hidden-lg hidden-md">
									<div  class="hidden-lg hidden-md" id="_e_msg"></div>
								</div>
							</div>
							
						</div>
					</div>
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
<script src="../src/plugins/dashTs/editPage.js"></script>
