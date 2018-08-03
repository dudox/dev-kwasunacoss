<?php 
include("src/classes.php");
if(isset($_SESSION['dev_user'])){
	echo "<script>window.open('./account/','_SELF')</script>";
}
$page_title = "Developer | Signin";
include("src/inc/header.php");
?>
<style>
a {
	cursor: pointer;
}
body {
	background-color: #F9F9F9;
}
</style>
<br><br><br><br>
<section class=" alert alert-info" style="margin-bottom: 0px;">
	<div class="container ">
		<div class="row align-items-center">
			<div class="col-md-1 text-center">
				<p><i class="fa fa-github fa-2x"></i></p>
			</div>
			<div class="col-md-9">
				<p>Interact and work together with Github. Push codes and contribute to the open source community.<br> Let's start a project together </p>
			</div>
			
			<div class="col-md-2">
				<a style="color:#fff;" class="btn btn-primary btn-block pb_btn-pill">Github&nbsp;&nbsp;<i class="fa fa-github-alt"></i></a>
			</div>
		</div>
	</div>
</section>
<section style=" padding: 20px; margin-top: 100px; margin-bottom:100px;">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-4  row  justify-content-center">
				<div class="col-md-12 text-center">
					<p><img style="width: 70px;" src="src/lib/assets/images/started/sign.png" class="img-fluid"/></p>
					<h3>Sign in to get unlimited access to resources</h3>
				</div>
				<div style="line-height:.7em;" class="col-md-3 col-xs-3 col-sm-3 text-center">
					<p>Post</p>
					<p><i  style="color:#1D82FF;" class="fa fa-lg fa-comment"></i></p>
				</div> 
				<div style="line-height:.7em;" class="col-md-3 col-xs-3 col-sm-3 text-center">
					<p>Contest</p>
					<p><i  style="color:#1D82FF;" class="fa fa-lg fa-trophy"></i></p>
				</div> 
				<div style="line-height:.7em;" class="col-md-3 col-xs-3 col-sm-3 text-center">
					<p>Codes</p>
					<p><i style="color:#1D82FF;" class="fa fa-lg fa-code"></i></p>
				</div> 
				<div style="line-height:.7em;" class="col-md-3 col-xs-3 col-sm-3 text-center">
					<p>Tutorial</p>
					<p><i style="color:#1D82FF;" class="fa fa-lg fa-file"></i></p>
				</div> 
			</div>
			<div class="col-md-1 hidden-xs hidden-sm align-items-center justify-content-center">
				<p><i class="fa fa-arrow-right fa-2x"></i></p>
			</div>
			<div class="col-md-5 align-items-center justify-content-center">
				<div class="card" style="padding: 20px;">
					<form method="POST" role="form">
						<div class="col-md-12">
							<div class="form-group">
								<label style="font-weight:500 !important;">Email/Username</label>
								<div class="input-group"><span class="input-group-addon"><span class="fa fa-user-circle"></span></span>
									<input type="text" name="user" id="user" tabindex="2" class="form-control pb_height-50 input-lg" placeholder="ex. dark_vadar">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label style="font-weight:500;">secretKey</label>
								<div class="input-group"><span class="input-group-addon"><span class="fa fa-key"></span></span>
									<input type="password" name="password" id="password" tabindex="2" class="form-control pb_height-50 input-lg" placeholder="Enter password">
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div id="message"></div>
						</div>
							<div class="col-md-12"><br>
								<button style="border-style: outset; border-color: #000;"  id="_d_login" class="btn btn-primary">Log In</button>
							</div>
					</form>
				</div>
				<div class="" style="margin-top: 20px; padding: 10px 5px;">
					<div class="card col-md-12">
						<p>Not a Member?&nbsp;&nbsp;<a href="signup">Create an Account</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
include("src/inc/footer.php");
?>
<script>
$(document).ready(function(){
	$("#_d_login").click(function(e){
		e.preventDefault();
		
		var user = $("#user").val();
		var pwd = $("#password").val();
		var msg = $("#message");
		
		if($.trim(user) === '' && $.trim(pwd) === ''){
			msg.html('<p style="color: red;"><i class="fa fa-info"></i>&nbsp;username and password cannot remain blank</p>');
			return false;
		}
		
		if($.trim(user) === ''){
			msg.html('<p style="color: red;"><i class="fa fa-info"></i>&nbsp;username cannot remain blank</p>');
			return false;
		}
		
		if($.trim(pwd) === ''){
			msg.html('<p style="color: red;"><i class="fa fa-info"></i>&nbsp;password cannot remain blank</p>');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: "src/function.php",
			data: {
				'function':'_fn_login',
				'username': user,
				'password':pwd
			},
			dataType: "text",
			beforeSend: function(){
				$("#_d_login").html(function(){
					$(this).attr("disabled","disabled");
					$(this).html('Proccessing&nbsp;<i class="fa fa-spinner fa-pulse"></i>');
				});
			},
			success: function(response){
				if($.trim(response) == 'success'){
					msg.html('<p style="color:forestgreen;"><i class=" fa fa-check-circle"></i>&nbsp;Sign in Successfully');
					$("#_d_login").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Log in');
					});
					setTimeout(function(){
						window.open("./account/","_SELF");
					},3000);
				}
				if($.trim(response) == 'declined'){
					msg.html('<p style="color: red;"><i class=" fa fa-frown-o"></i>&nbsp; username or password is incorrect</p>');
					$("#_d_login").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Try Again');
					});
				}
				
				if($.trim(response) == 'null'){
					msg.html('<p style="color:orange;"><i class=" fa fa-frown-o"></i>&nbsp; user {{'+user+'}} does not exist on our server</p><span style="color: #000;">&nbsp; to sign up&nbsp;<a href="signup">click here</a></span>');
					$("#_d_login").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Try Again');
					});
				}
			},
		});
	});
});
</script>
