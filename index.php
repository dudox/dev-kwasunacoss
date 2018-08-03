<?php 
include("src/classes.php");
if(isset($_SESSION['dev_user'])){
	echo "<script>window.open('./acount/','_SELF')</script>";
}
$page_title = "Developer | Home";
include("src/inc/header.php");
?>
<link rel="stylesheet" type="text/css" href="codepen.css"/>
 <section style="background-image: url('./src/lib/assets/images/bg/1.png');" class="pb_cover_v1 overflow-hidden cover-bg-opacity-1 text-left pb_gradient_v1" id="section-home">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
			  <style>
				.kn-heading {
					text-transform: uppercase;
					text-shadow: 0px 0px 1px #000;
					color: #fff;
					font-weight: 800 !important;
				}
				a {
					cursor: pointer;
				}
			  </style>
            <h1  class="kn-heading">Built for Developers</h1>
			<div>
				<p style="color: #C6C8CB; font-size: 25px; font-weight:400;">This is yet Another of Kwasunacoss creation for Developers and those who love solving problems. Pages is <span style="color: #fff; font-weight: 900;">Open Source</span>. Enjoy</p>
           </div>
          </div> 
          <div class="col-md-1">
          </div>
          <div class="col-md-5 hidden-xs relative align-self-center">
            
            <form id="_dev_register" style="margin-top: 120px;" class="bg-white rounded pb_form_v1" method="POST">
              <h2 class="mb-2 mt-0 text-center">Sign Up for Free</h2>
              <div id="_dev_msg"></div>
              <div class="form-group">
                <div class="input-group">
					<div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
					 <input  name="_dev_username" id="_dev_username" type="text" class="form-control" placeholder="CoderBlavk">
                </div>
              </div>
			<div class="form-group">
                <div class="input-group">
					<div class="input-group-addon"><i class="fa fa-key"></i></div>
					 <input id="_dev_passkey"  type="password" class="form-control" placeholder="**********">
                </div>
            </div>
		    <div class="form-group">
				<div class="pb_select-wrap">
				  <select id="_dev_type" class="form-control">
					<option value="nothing">--Choose--</option>
					<option value="Web Developement">Web Dev++</option>
					<option value="Mobile App Development">Mobile App</option>
					<option value="Hacking">Ethical hacking</option>
					<option value="Pure Programming">Programming</option>
				  </select>
				</div>
		    </div>
              <div class="form-group">
                <button id="_dev_submit"  type="submit" class="btn btn-success btn-block pb_btn-pill">Register</button>
              </div>
              <div class="col-md-12">
				<p>By clicking “Register”, you agree to our terms of <a style="color: #000;" href="#">service and privacy statement.</a></p>
              </div>
            </form>

          </div> 
        </div>
      </div>
    </section>
    <!-- END section -->
    <section class=" alert alert-info" style="margin-bottom: 0px;">
	<div class="container ">
		<div class="row align-items-center">
			<div class="col-md-1 text-center">
				<p><i class="fa fa-hashtag fa-2x"></i></p>
			</div>
			<div class="col-md-9">
				<p>Contribute to our developer community by posting codes for fixes and debugging, Kwasunacoss is here to for you! </p>
			</div>
			
			<div class="col-md-2">
				<a style="color:#fff;" class="btn btn-success btn-block pb_btn-pill">Contribute&nbsp;&nbsp;<i class="fa fa-github-alt"></i></a>
			</div>
		</div>
	</div>
</section>
    <section  style="background-color: #FBFDFE;">
      <div class="container">
		  <div class="row">
              <div class="col">
				  <br><br>
                <h1>Getting Started</h1>
                <p class="pb_font-20">Let's get you started on your Journey and guide you through it</p>
              </div>
            </div>
        <div class="row align-items-center ">
          <div class="col-lg-6 order-1">
            <img src="wrapper-img.gif" alt="Image placeholder" class="img-fluid">
          </div>
          <div class="col-lg-6 pr-md-5 pr-sm-0 order-1  mb-5">
            
            <div class="row">
              <div class="col-lg">
                
                <div class="media pb_feature-v2 text-left mb-1 mt-5">
                  <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="fa fa-code pb_icon-gradient"></i></div>
                  <div class="media-body">
                    <h3 class="mt-2 mb-2 heading">Programming</h3>
                    <p class="text-sans-serif pb_font-16">C, C++, Java, VBNet and Python. We're setting up everthing you need!</p>
                    <a href="./pure-programming" style="border-width: 2px; border-style:solid; border-color: #4F83E8;" class=" btn btn-default btn-outline">Try it&nbsp;&nbsp;<i class="fa fa-rocket pb_icon-gradient"></i></a>
                  </div>
                </div> 
                
                <div class="media pb_feature-v2 text-left mb-1 mt-5">
                  <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="fa fa-desktop pb_icon-gradient"></i></div>
                  <div class="media-body">
                    <h3 class="mt-2 mb-2 heading">Web Development</h3>
                    <p class="text-sans-serif pb_font-16">Let's get you started with building a functional website with incredible web technologies</p>
                    <a style="border-width: 2px; border-style:solid; border-color: #4F83E8;" class=" btn btn-default btn-outline">Try it&nbsp;&nbsp;<i class="fa fa-rocket pb_icon-gradient"></i></a>
                  </div>
                </div> 

              </div>
              <div class="col-lg">
                
                <div class="media pb_feature-v2 text-left mb-1 mt-5">
                  <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="fa fa-android pb_icon-gradient"></i></div>
                  <div class="media-body">
                    <h3 class="mt-2 mb-2 heading">App Development</h3>
                    <p class="text-sans-serif pb_font-16">Cross-platform mobile development into windows, ios & android</p>
                    <a style="border-width: 2px; border-style:solid; border-color: #4F83E8;" class=" btn btn-default btn-outline">Try it&nbsp;&nbsp;<i class="fa fa-rocket pb_icon-gradient"></i></a>
                  </div>
                </div>

                <div class="media pb_feature-v2 text-left mb-1 mt-5">
                  <div class="pb_icon d-flex mr-3 align-self-start pb_w-15"><i class="fa fa-linux pb_icon-gradient"></i></div>
                  <div class="media-body">
                    <h3 class="mt-2 mb-2 heading">Ethical Hacking</h3>
                    <p class="text-sans-serif pb_font-16">Penetration and testing guides for student who wants to study the art of cyber security</p>
                    <a style="border-width: 2px; border-style:solid; border-color: #4F83E8;" class=" btn btn-default btn-outline">Try it&nbsp;&nbsp;<i class="fa fa-rocket pb_icon-gradient"></i></a>
                  </div>
                </div>    

              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
<section style="padding: 30px; width:100%; background-color: #F2F4F9;">
	<div class="container">
		<div class="col-md-12 text-center">
			<h1>Become a Developer with GitHub</h1>
		</div>
		<div class="row align-items-center justify-content-center">
			<div class="col-md-7 col-xs-12 col-sm-12 row">
				<div class="col-md-2 text-center">
					<center><p><i class="fa fa-5x fa-github"></i></p></center>
				</div>
				<div class="col-md-10 col-xs-12 col-sm-12">
					<p> better way to work together GitHub brings teams together to work through problems, move ideas forward, and learn from each other along the way. </p>
					<a  style="color:#fff;" class="btn btn-primary">GitHub&nbsp;&nbsp;<i class="fa fa-github-alt fa-lg"></i></a>
				</div>
			</div>
			<div class="col-md-5">
				<pre class="codepen-able hidden-xs" data-type="html"><code><i class="fa fa-lg fa-github"></i>&nbsp;&nbsp;git push //Start pushing codes to a reposiotry<br> and work as a Team #Kwasunacoss </code>
				</pre>		
			</div>
		</div>
	</div>
</section>
<section class="hidden-sm hidden-xs" style="padding: 30px; width:100%; color: #000;">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center">
				<a href="#section-home">
					<p><i class="fa fa-2x fa-home"></i></p>
					<p>Home</p>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a>
					<p><i class="fa fa-2x fa-briefcase"></i></p>
					<p>Products</p>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<a>
					<p><i class="fa fa-2x fa-trophy"></i></p>
					<p>Contest</p>
				</a>
			</div>
			<div class="col-md-3 text-center">
				<?php if(isset($_SESSION['dev_user'])){?>
				<a>
					<p><i class="fa fa-2x fa-github"></i></p>
					
						<p><?php echo $log->_user('username');?></p>
						
				</a>
				<?php } else {?>
				<a>
					<p><i class="fa fa-2x fa-github"></i></p>
					
						<p>Sign in</p>
						
				</a>
				<?php }?>
			</div>
		</div>
	</div>
</section>

<?php 
include("src/inc/footer.php");
?>
<script src="codepen.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	load_content('');
	$("#_dev_register").on('submit',function(e){
		e.preventDefault();
		
		if($("#_dev_username").val() === '' &&  $("#_dev_passkey").val() === '' ){
			$("#_dev_msg").html(function(){
				$(this).html('<div style="color: red;"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;please enter username and password</div>').fadeIn(1000);
				$(this).delay(2000).fadeOut();
			});
			return false;
		}
		
		if($("#_dev_username").val() === ''){
			$("#_dev_msg").html(function(){
				$(this).html('<div style="color: red;"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;username cannot remain empty</div>').fadeIn(1000);
				$(this).delay(2000).fadeOut();
			});
			return false;
		}
		
		
		if($("#_dev_passkey").val() === ''){
			$("#_dev_msg").html(function(){
				$(this).html('<div style="color: red;"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;password cannot remain empty</div>').fadeIn(1000);
				$(this).delay(2000).fadeOut();
			});
			return false;
		}
		
		
		
		$.ajax({
			type: "POST",
			url: "src/function.php",
			data: {
				'function':'_fn_register',
				'username': $("#_dev_username").val(),
				'password': $("#_dev_passkey").val(),
				'type': $("#_dev_type").val()
			},
			dataType: "text",
			beforeSend: function(){
				$("#_dev_submit").html(function(){
					$(this).attr("disabled","disabled");
					$(this).html('Processing&nbsp;&nbsp;<i class="fa fa-spinner fa-pulse"></i>');
				});
			},
			success: function(response){
				if($.trim(response) == 'success'){
					$("#_dev_submit").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Sign up');
					});
					$("#_dev_msg").html(function(){
						$(this).html('<p style="color: forestgreen;"><i class=" fa fa-check-circle"></i>&nbsp;Successfully Registered! </p>').fadeIn(700);
					});
					setTimeout(function(){
						window.open("./signin","_SELF");
					},3000);
				}
				if($.trim(response)  == 'declined'){
					$("#_dev_submit").html(function(){
						$(this).removeAttr("disabled");
						$(this).html('Try Again');
					});
					$("#_dev_msg").html(function(){
						$(this).html('<p style="color: orange;"><i class=" fa fa-frown-o"></i>&nbsp;Oooops try another user {{'+ $("#_dev_username").val()+ '}}  has been taken </p>').fadeIn(700);
					});
				}
			}
			
		});
	});
});


</script>
