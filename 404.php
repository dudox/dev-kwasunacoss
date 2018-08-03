

<?php
$page_title= "Create Contrib";
include("src/inc/header.php");
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
