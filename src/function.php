<?php 
include("config.php");

@$func = $_POST['function'];
@$_func = $_GET['function'];
switch($func){
	case '_fn_register':
		_fn_register();
		break;
		
	case '_fn_login':
		_fn_login();
		break;
		
	case '_update_personal':
		_update_personal();
		break;
		
	case '_update_password':
		_update_password();
		break;
		
	case 'update_feed_r':
		update_feed_r();
		break;
		
	case '_update_social':
		_update_social();
		break;
}

function _fn_login(){
	global $conn;
	$user = $_POST['username'];
	$password = md5($_POST['password']);
	
	$qry = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' or username='$user'");
	$row = mysqli_num_rows($qry);
	if($row != 0){
		$dd = mysqli_fetch_array($qry);
		if($user == $dd['username']){if($password == $dd['password']){ $_SESSION['dev_user'] = $user; echo "success";}else { echo "declined";}} else {echo "declined";}
		
	} else { echo "null";}
}

function _fn_register(){
	global $conn;
	$user = $_POST['username'];
	$password = md5($_POST['password']);
	$type = $_POST['type'];
	
	$qry = mysqli_query($conn,"SELECT * FROM users WHERE email='$user' or username='$user'");
	$row = mysqli_num_rows($qry);
	if($row == 0){
		$req = mysqli_query($conn,"INSERT INTO users (username,password,type) VALUES('$user','$password','$type')");
		if($req){
			echo "success";
		}
	} else {
		echo "declined";
	}	
	
}

function _update_personal(){
	global $conn;
	$f = $_POST['f'];
	$u = $_POST['u'];
	$e = $_POST['e'];
	$p = $_POST['p'];
	$t = $_POST['t'];
	$b = $_POST['b'];
	
	$query = mysqli_query($conn,"UPDATE users set fullname='$f', username='$u', email='$e', phone='$p', type='$t', bio='$b' WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
	if($query){
		$res = '
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong style="font-weight:900;">Update Successful</strong>&nbsp;&nbsp;Personal information has been updated! Cheers
			</div>
		';
		echo $res;
	}
}

function _update_password(){
	global $conn;
	$old = md5($_POST['o']);
	$pwd = md5($_POST['password']);
	
	$query = mysqli_query($conn,"SELECT * FROM users WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	$authKey = $dd['password'];
	
	if($old != $authKey){
		$res ='
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong style="font-weight:900;"><i class="fa fa-frown-o"></i>&nbsp;&nbsp;Error</strong>&nbsp;&nbsp;old password is incorrect
			</div>
		';
		echo $res;
	}
	else {
		$update = mysqli_query($conn, "UPDATE users set password='$pwd' WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
		if($update){
			$res = '
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<strong style="font-weight:900;">Update Successful</strong>&nbsp;&nbsp;Your new password has been updated! Cheers
				</div>
			';
			echo $res;
		}
	}
}

function update_feed_r(){
	global $conn;
	$val = $_POST['val'];
	$param = $_POST['param'];
	$query = mysqli_query($conn,"UPDATE feed_r set $param='$val' WHERE account='".$_SESSION['dev_user']."'");
	if($query){
		echo "success";
	}
}

function _update_social(){
	global $conn;
	$f = $_POST['f'];
	$t = $_POST['t'];
	$s = $_POST['s'];
	$g = $_POST['g'];
	$query = mysqli_query($conn,"UPDATE users set facebook='$f', twitter='$t', skype='$s', github='$g' WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
	if($query){
		$res = '
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<strong style="font-weight:900;">Update Successful</strong>&nbsp;&nbsp;Social information successfully updated
			</div>
		';
		echo $res;
	}
}

switch($_func){
	case '_check_profile':
		_check_profile();
		break;
	
	case '_profile_card':
		_profile_card();
		break;
		
	case '_personal':
		_personal();
		break;
		
	case '_pp':
		_pp();
		break;
		
	case '_p_password':
		_p_password();
		break;
		
	case '_feed_r':
		_feed_r();
		break;
		
	case '_p_contrib':
		_p_contrib();
		break;
}


function _check_profile(){
	global $conn;
	$res = "";
	$query = mysqli_query($conn,"SELECT * FROM users WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	if($dd['fullname'] == '' || $dd['email'] == '' ||  $dd['username'] == ''){
		$res = '
			<div class="alert alert-info alert-dismissable row align-items-center">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<strong style="font-weight:900;">Tips</strong>  Updating your profile with your name, phone, email, and a profile picture helps other Naccossite users get to know you..
					</div>
					<div class="col-md-2 col-sm-12 col-xs-12">
						<a style="color: #fff; font-weight: 800; " href="edit" class="btn btn-success"><i class="fa fa-pencil"></i>&nbsp;Edit profile</a>
					</div>
				</div>
		';
		echo $res;
	} else {
		$res = '
			<div class="alert alert-success alert-dismissable row align-items-center">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<div class="col-md-9 col-xs-12">
					<strong style="font-weight:900;">Tips</strong>  Now that you have successfully completed your profile. Lets help you get started
				</div>
				<div class="col-md-2 col-xs-12">
					<a style="color: #000; font-weight: 800; background-color: #f9f9f9;" href="guide" class="btn btn-default"><i class="fa fa-file"></i>&nbsp;Guide</a>
				</div>
			</div>
		';
		echo $res;
	}
	
}

function _profile_card(){
	global $conn;
	$query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$_SESSION['dev_user']."' or email='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	
	$res = '
		<div class="card profile-card-3">
			<div class="background-block" style="background-color: #3FA9F5;">
			</div>
			<div class="profile-thumb-block">
				<img src="../src/lib/assets/images/profile/'.$dd['img'].'" alt="profile-image" class="profile"/>
			</div>
			<div class="card-content">
				<h2>'.$dd['fullname'].'<small>'.$dd['type'].'</small></h3>
			</div>
				<p style="margin-top: 30px;"><a style="color: #fff; font-weight: 800;" href="edit" class="btn btn-block btn-primary"><i class=""></i>&nbsp;Edit profile</a></p>
		</div>

	';
	echo $res;
}

function _personal(){
	global $conn;
	$query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$_SESSION['dev_user']."' or email='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	$res = '
		<form method="POST">
			<div class="row justify-content-center">
				<div class="col-md-6 form-group">
					<label>Fullname</label>
					<input type="text" placeholder="Fullname" value="'.$dd['fullname'].'" id="fullname" class="pb_height-50 form-control"/>
					
				</div>
				<div class="col-md-6 form-group">
					<label>Username</label>
					<input type="text" placeholder="Username" id="username" value="'.$dd['username'].'" class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-12 form-group">
					<label>Email</label>
					<input type="text" placeholder="Email" id="email" value="'.$dd['email'].'"  class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-6 form-group">
					<label>Phone</label>
					<input type="text" placeholder="Mobile No" id="phone" value="'.$dd['phone'].'" class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-6 form-group">
					<label>Field</label>
					<select id="type" class="form-control pb_height-50">
						<option value="Web Developer">Web Developer</option>
						<option value="Mobile App Developer">Mobile App Developer</option>
						<option value="Programmer">Programmer</option>
						<option value="Ethical Hacker">Testing & Penetrating Expert</option>
					</select>
				</div>
				<div class="col-md-12 form-group">
					<label>Bio</label>
					<textarea id="bio" placeholder="Short bio about you" class="form-control pb_height-50">'.$dd['bio'].'</textarea>
				</div>
				<div class="col-md-12 form-group">
					<button id="_update_personal" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	';
	echo $res;
}

function _pp(){
	global $conn;
	$query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$_SESSION['dev_user']."' or email='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	$res = '
		<div class="row align-items-center justify-content-center">
			<div class="col-md-12">
				<center>
					<img style="width:200px;" src="../src/lib/assets/images/profile/'.$dd['img'].'" class="img-fluid"/>
					<br><br>
					<button class="btn btn-danger">Change Picture&nbsp;&nbsp;<i class="fa fa-image"></i></button>
				</center>
			</div>
		</div>
	';
	echo $res;
}

function _p_password(){
	global $conn;
	
	$res = '
		<form method="POST">
			<div class="row justify-content-center">
				<div class="col-md-12 form-group">
					<label>Old password</label>
					<input type="password" placeholder="Old password" value="**********" id="op" class="pb_height-50 form-control"/>
					
				</div>
				<br>
				<hr/>
				<br>
				<div class="col-md-12 form-group">
					<label>New password</label>
					<input type="password" placeholder="New password" id="np" value="" class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-12 form-group">
					<label>Retype password</label>
					<input type="password" placeholder="Confirm password" id="cnp" value=""  class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-12 form-group">
					<button id="_update_password" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
	';
	echo $res;
}

function _feed_r(){
	global $conn;
	$query = mysqli_query($conn,"SELECT * FROM feed_r WHERE account='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	if($dd['posts'] == "yes"){ $p_checked = "checked"; $p_btn = "Enabled";}else{$p_checked = ""; $p_btn = "Disabled";}
	if($dd['trends'] == "yes"){ $h_checked = "checked"; $h_btn = "Enabled";}else{$h_checked = ""; $h_btn = "Disabled";}
	if($dd['contrib'] == "yes"){ $c_checked = "checked"; $c_btn = "Enabled";}else{$c_checked = ""; $c_btn = "Disabled";}
	if($dd['events'] == "yes"){ $e_checked = "checked"; $e_btn = "Enabled";}else{$e_checked = ""; $e_btn = "Disabled";}
	if($dd['topics'] == "yes"){ $t_checked = "checked"; $t_btn = "Enabled";}else{$t_checked = ""; $t_btn = "Disabled";}
	$res = '
		<div class="row">
			<div class="com-md-12">
				<h4 class="form-label">Control what you wish to see on your Timeline</h4>
				<br>
			</div>
			
			<div class="col-md-12 row">
				<div class="col-md-6">
					<label>Featured posts</label><hr/>
					<p>By Disabling this, you will stop getting feeds on your timeline about posts, featured or not</p>
					<div class="form-group">
						<div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input class="selectgroup-input" type="checkbox" '.$p_checked.'>
								<span onclick=_f_toggle(this,"posts") class="selectgroup-button">'.$p_btn.'</span> <br>
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label>Featured Events & Contest</label><hr/>
					<p>By Disabling this, you will no longer see events or available contest on your timeline</p>
					<div class="form-group">
						<div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input name="value" value="POST" class="selectgroup-input" '.$e_checked.' type="checkbox">
								<span onclick=_f_toggle(this,"events") class="selectgroup-button">'.$e_btn.'</span> <br>
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label>Engaged Contrib</label><hr/>
					<p>By Disabling this, you will be unable to track projects and contributions in your timeline</p>
					<div class="form-group">
						<div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input name="value" value="POST" class="selectgroup-input" '.$c_checked.' type="checkbox">
								<span onclick=_f_toggle(this,"contrib") class="selectgroup-button">'.$c_btn.'</span> <br>
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label>Featured Topics</label><hr/>
					<p>By Disabling this, you will stop getting feeds on your timeline about posts, featured or not</p>
					<div class="form-group">
						<div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input name="value" value="POST" class="selectgroup-input" '.$t_checked.' type="checkbox">
								<span onclick=_f_toggle(this,"topics") class="selectgroup-button">'.$t_btn.'</span> <br>
							</label>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<label>Featured Trends / Highlights</label><hr/>
					<p>By Disabling this, you will stop getting feeds on your timeline about posts, featured or not</p>
					<div class="form-group">
						<div class="selectgroup selectgroup-pills">
							<label class="selectgroup-item">
								<input name="value" value="POST" class="selectgroup-input" '.$h_checked.' type="checkbox">
								<span onclick=_f_toggle(this,"trends") class="selectgroup-button">'.$h_btn.'</span> <br>
							</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	';
	echo $res;
}

function _p_contrib(){
	global $conn;
	$query = mysqli_query($conn,"SELECT * FROM users WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
	$dd = mysqli_fetch_array($query);
	$list = $dd['skills'];
	$key = implode(",",$list);
	foreach($key as $val){
		 $val .= $val;
	}
	$res = '
		<form method="POST">
			<div class="row justify-content-center">
				<div class="col-md-6 form-group">
					<label><i class="fa fa-facebook"></i>&nbsp;&nbsp;Facebook</label>
					<input type="text" placeholder="facebook link" value="'.$dd['facebook'].'" id="facebook" class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-6 form-group">
					<label><i class="fa fa-twitter"></i>&nbsp;&nbsp;Twitter</label>
					<input type="text" placeholder="twitter link" id="twitter" value="'.$dd['twitter'].'" class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-6 form-group">
					<label><i class="fa fa-skype"></i>&nbsp;&nbsp;Skype</label>
					<input type="text" placeholder="Skype" id="skype" value="'.$dd['skype'].'"  class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-6 form-group">
					<label><i class="fa fa-github"></i>&nbsp;&nbsp;Github</label>
					<input type="text" placeholder="Github" id="github" value="'.$dd['github'].'" class="pb_height-50 form-control"/>
				</div>
				<div class="col-md-12 form-group">'.$val.'
					<button id="_update_social" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
		<div class="col-md-12">
			<br>
			<label>Skills</label>
			<hr/>
		</div>
		<div class="row col-md-12 form-group">
			<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"html5") class="selectgroup-button">HTML5</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input" type="checkbox">
						<span onclick=_skills_toggle(this,"bootstrap") class="selectgroup-button">BOOTSTRAP</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"java") class="selectgroup-button">JAVA</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"c/c++") class="selectgroup-button">C/C++</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"jQuery&ajax") class="selectgroup-button">jQuery&Ajax</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"sql") class="selectgroup-button">SQL</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"php") class="selectgroup-button">NATIVE Script</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"angularjs") class="selectgroup-button">AngularJS</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"nodejs") class="selectgroup-button">NodeJs</span> <br>
					</label>
				</div>
				<div class="selectgroup selectgroup-pills">
					<label class="selectgroup-item">
						<input name="value" value="POST" class="selectgroup-input"  type="checkbox">
						<span onclick=_skills_toggle(this,"vbnet") class="selectgroup-button">VBNet</span> <br>
					</label>
				</div>
			</div>
		</div>
	';
	print_r($res);
}
?>
