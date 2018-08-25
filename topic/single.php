<?php 
include("../src/classes.php");
$id = $_GET['t'];
$page_title = $topic->d_topic($id,'title');
include("../src/inc/_header.php");
?>
<link rel="stylesheet" type="text/css" href="../src/plugins/editor/css/bootstrap-wysihtml5.css"/>
<link rel="stylesheet" type="text/css" href="../codepen.css"/>
<section style="margin-top: 130px;">
	<div class="container">
		<div class="col-md-12">
			<div id="banner"></div>
		</div>
		<input type="hidden" id="tid" value="<?php echo $id ?>"/>
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
						<a style="color: #fff; font-weight: 800; " href="new" class="btn btn-primary"><i class="fa fa-log-in"></i>&nbsp;Post a topic</a>
					</div>
				</div>
				<?php }?>
			</div>
			<div class="col-md-2 text-center">
				<label style="padding: 5px;" class="hidden-lg"><i class="fa fa-calendar"></i>&nbsp;Date Posted:&nbsp;&nbsp;<?php echo $topic->d_topic($id,'date');?></label>
				<div class="hidden-xs hidden-sm text-center">
					<center>
						<i class="fa fa-chevron-up"></i><br>
						<?php echo $topic->up_topic($id,'topic_d','lg');?>
						<i class="fa fa-chevron-down fa-lg"></i><br>
					</center>
				</div>
				<div class="pull-left hidden-sm hidden-xs">
					<a href="#"><img  src="lib/img/ads/ad1.png"/></a><br><hr/>
					<a href="#"><img  src="lib/img/ads/ad3.jpeg"/></a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-body">
						<h4><?php echo $topic->d_topic($id,'title');?></h4>
						<label><i class="fa fa-user-circle"></i>&nbsp;<a href=""><?php echo $topic->d_topic($id,'username');?></a>&nbsp;|&nbsp;<?php  echo $topic->s_topic($id,'topic_d');?>&nbsp;|&nbsp;<a onclick="user_like()"><i class="fa fa-star fa-lg"></i></a></label><br>
						<label><i class="fa fa-link"></i>&nbsp;Resource link:<a href="#">&nbsp;<?php echo $topic->d_topic($id,'link');?></a></label><br>
						<label class="hidden-xs hidden-sm"><i class="fa fa-calendar"></i>&nbsp;Date Posted:&nbsp;&nbsp; <?php echo $topic->d_topic($id,'date');?></label>
						<hr/>
						<p><label><i class="fa fa-book"></i></label>&nbsp;&nbsp;<?php echo $topic->d_topic($id,'description');?></p>
						<pre class="codepen-able" data-type="html"><code><?php echo $topic->d_topic($id,'code');?></code>
						</pre>
					</div>
					<label style="padding: 5px;">&nbsp;&nbsp;<span style="background-color: #3FA9F5; color: #fff;" class="badge"><i class="fa fa-check"></i>&nbsp;<?php $topic->tcomment_c($id);?> Contributions</span></label>
				</div>
					<!--
						Start Comment 
					 -->
						<div id="loadComment"></div>
					<!--
						End Comment 
					 -->
				<div class="container" style="magin: 0px !important; padding: 0px !important;">
					<div class="justify-content-center">
						<div class="col-md-12">
							<form id="commentForm"  method="post">
								<div class="card rounded-0">
									<div class="card-header p-0">
										<div style="background-color: #3FA9F5;" class="text-white text-center py-2">
											<h3 style="color: #fff;"><i class="fa fa-comment"></i>&nbsp;&nbsp;Contribute here</h3>
											<p class="m-0">Share your</p>
										</div>
									</div>
									<div class="row card-body p-3">
										<?php if(!isset($_SESSION['dev_user'])){?>
										<div class="col-md-12">
											<label>You're not currently signed in.&nbsp;<span style="color: #ED1E79;"><br>You must specify a display name to continue or</span>&nbsp;<a href="../signin">Login</a></label>
										</div>
										<div class="col-md-12 form-group">
											<label><i class="fa fa-user-circle"></i>&nbsp;display name</label>
											<input type="text" class="form-control" id="cname" name="cname" placeholder="Name to display" required>
										</div>
										<?php }?>
										<div class="col-md-12">
											<input type="hidden" class="form-control" id="ctid" name="ctid" value="<?php echo $id;?>" required>
											<label ><i class="fa fa-pencil"></i>&nbsp;&nbsp;description</label>
											 <textarea class="textarea_editor form-control" id="edesc" name="cdescription" rows="15" placeholder="Help users understand you" style="height:150px" required="required"></textarea>
										</div>
										
										<div class="col-md-12">
											<label style="color: #ED1E79;"><i class="fa fa-code"></i>&nbsp;&nbsp;paste code</label>
											<textarea name="ccode" class="form-control" required="required" placeholder="Paste your codes here"></textarea>
										</div>
										<div class="col-md-12">
											<br>
											<input type="submit" id="btnComment" value="Drop" style="background-color:  #3FA9F5; color: #fff;" class="btn">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 hidden-xs hidden-sm">
				<label>Related Topics</label>
				<hr/>
				<?php $topic->r_topic('solved',$id);?>
				<hr/>
				<div class="hidden-sm hidden-xs">
					<a href="#"><img  src="lib/img/ads/ad2.png"/></a>
				</div>
				
			</div>
		</div>
	</div>
</section>
<?php 
$topic->seen_topic($id);
?>
<br><br>
<?php 
include("../src/inc/_footer.php");
?>
<script src="../src/plugins/editor/js/wysihtml5-0.3.0.js"></script>
<script src="../src/plugins/editor/js/bootstrap-wysihtml5.js"></script>
<script src="../src/plugins/editor/js/wysihtml5-init.js"></script>
<script>var val = <?php echo $_GET['t'];?>;</script>
<script src="lib/js/single.js"></script>
