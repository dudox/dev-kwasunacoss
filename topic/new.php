
<link rel="stylesheet" type="text/css" href="../src/plugins/editor/css/bootstrap-wysihtml5.css"/>

<?php 
include("../src/classes.php");
$page_title = "Post a topic";
include("../src/inc/_header.php");
?>
<style>
body {
	background-color: #f9f9f9;
}

label {
	font-weight: 400 !important;
	color: #000;
	font-size: 15px;
}

form-control {
	border-style: double;
	border-color: #2D3246;
	border-width: 2px;
}

.btn {
	cursor: pointer;
}
</style>



<section  style="margin-top: 130px;">
	<div id="postnew" class="container">
		<div class="row align-items-center justify-content-center">
			<div class="row col-md-6">
				<div class="col-md-12">
					<h4><center>POST A TOPIC</center></h4>
					<h6><center><span class="badge badge-secondary">share</span>&nbsp;|&nbsp;<span class="badge badge-secondary">solve</span>&nbsp;|&nbsp;<span class="badge badge-secondary">contribute</span></center></h6>
				</div>
				<form id="topicForm" method="POST" enctype="">
					<div class="card">
						<div class="row card-body">
							<div class="col-md-6">
								<label>title</label>
								<input type="text" name="topic-title" placeholder="Topic title" class="form-control" required/>
							</div>
							<div class="col-md-6">
								<label>display name <span style="color: #ED1E79;">(Optional)</span></label>
								<input type="text" name="topic-dis-name" placeholder="Display name" class="form-control"/>
							</div>
							<div class="col-md-12">
								<hr/>
								<label><i class="fa fa-envelope"></i>&nbsp;&nbsp;Receive answers on my email</label><br/>
								<input type="checkbox" name="topic-email" id="check" value="yes" class="checkbox" /> 
								<label style="color: #ED1E79; font-weight:400 !important; font-size: 12px;" class="check-msg"></label>
								<hr/>
							</div>
							<div class="col-md-12">
								<label ><i class="fa fa-pencil"></i>&nbsp;&nbsp;description</label>
								 <textarea class="textarea_editor form-control" id="edesc" name="topic-description" rows="15" placeholder="Help users understand you" style="height:150px" required="required"></textarea>
							</div>
							<div class="col-md-12">
								<label style="color: #ED1E79;"><i class="fa fa-code"></i>&nbsp;&nbsp;paste code</label>
								<textarea name="topic-code" class="form-control" required="required" placeholder="Paste your codes here"></textarea>
							</div>
							<div class="col-md-12">
								<label>tags</label>
								<input type="text" name="topic-tag" class="form-control" placeholder="ex. html,bootstrap,css ..." required/>
								<p style="font-size: 12px; color: #ED1E79;">Enter at least one, separete each tags with a comma. ","</p>
							</div>
							<div class="col-md-12">
								<button id="topicNew" type="submit"  class="btn btn-success btn-outline">Push</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="success" class="container" style="display: none;">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-6 ">
				<div class="card">
					<div class="card-body">
						<div class="col-md-12" style="">
							<center>
								<p style="color: forestgreen;"><i class="fa fa-smile-o fa-5x"></i></p>
								<p style="padding: 0px; margin: 0px;">Congratulations, your topic is now <span style="color:  #ED1E79; font-weight:900;">Live</span></p>
								<label class=" text-left">You can now start getting response(s) from other developers, go to dashboard to check your stat 
									<a href="#" class="badge badge-info">
										<i class="fa fa-bars"></i>&nbsp;Dashboard
									</a>
								</label>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br>
<?php 
include("../src/inc/_footer.php");
?>
<script src="../src/plugins/editor/js/wysihtml5-0.3.0.js"></script>
<script src="../src/plugins/editor/js/bootstrap-wysihtml5.js"></script>
<script src="../src/plugins/editor/js/wysihtml5-init.js"></script>
<script type="text/javascript" src="lib/js/createNew.js"></script>
