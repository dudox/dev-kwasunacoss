

<?php
include("../../src/config.php");

@$function = $_GET['function'];
switch($function){
	case 'load_content':
		load_content();
		break;
		
	case 'load_comment':
		loadComment();
		break;
}

@$func = $_POST['function'];
switch($func){
	case 'addComment':
		addComment();
		break;
}


function load_content(){
	global $conn;
	$pageno = $_GET['pageno'];
	$no_of_records_per_page = 10;
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	
	$total_pages_sql = "SELECT COUNT(*) FROM topic_d";
	$result = mysqli_query($conn,$total_pages_sql);
	$total_rows = mysqli_fetch_array($result)[0];
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	
	$sql = "SELECT * FROM topic_d  LIMIT $offset, $no_of_records_per_page";
	$res_data = mysqli_query($conn,$sql);
	while($dd = mysqli_fetch_assoc($res_data)){
		$text = $dd['title'];
		$title = text_limit($text,40);
		$date = $dd['date'];
		$id = $dd['id'];
		$account = $dd['account'];
		$tid = $dd['tid'];
		$res = '
		<style>
			a label {
			cursor: pointer;
		}
		</style>
			<div style="min-height:50px !important; line-height: 1em;" class="col-md-4">
				<div class="card">
					<div class="card-body">
						<label><a href="./single?t='.$dd['id'].'"><small style="font-size: 14px;">'.$title.'</small></a></label>
						<p style="font-size: 13px; color: #000;"><i class="fa fa-star"></i>&nbsp;'.$dd['star'].'&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;'.$dd['seen'].'&nbsp;&nbsp;<span class="badge badge-success"><i class="fa fa-check-circle">&nbsp;</i>solved</span></p>
						'.tags($id).'
						<hr/>
						<p style="font-size: 15px;"><a href="single?t='.$id.'"><label style="color: gray;" class="badge badge-default pull-left"><i class="fa fa-user"></i>&nbsp;'.$dd['username'].'&nbsp;&nbsp;<i class="fa fa-comment"></i>&nbsp;'.comment($tid,$account).'</label></a><label style="color: gray;" class="badge badge-default pull-right"><i class="fa fa-calendar"></i>&nbsp;'.edate($date,'D m, Y').'</label></p>
					</div>
				</div>
			</div>
		';
		print_r($res);
	}
	load_pager($pageno,$total_pages);
}

function tags($id){
	global $conn;
	$query = mysqli_query($conn,"SELECT * FROM topic_d WHERE id='$id'");
	$dd = mysqli_fetch_array($query);
	$ob = "";
	$n = explode(",", $dd['attrib']);
	foreach($n as $obj_){
		if($obj_ != ""){
			$ob .= '<span style="font-size: 10px;" class="badge badge-secondary"><i class="fa fa-hashtag"></i>'.$obj_.'</span>'.'&nbsp;';
		}else {
			$ob = '<span style="font-size: 10px;" class="badge badge-secondary">No related tags</span>';
		}
	}
	return $ob;
}

function comment($tid,$account){
	global $conn;
	$counter = 0;
	$query = mysqli_query($conn,"SELECT * FROM topic_c WHERE tid='$tid'");
	while( $dd = mysqli_fetch_assoc($query)){
		$counter += 1;
	}
	return $counter;
}

function load_pager($pageno,$total_pages){
	global $conn;
	if($pageno <= 1){ $p = 'disabled'; }
	 if($pageno >= $total_pages){ $v = 'disabled'; }
	$res = '
		<ul class="pagination">
			<li><a class="btn btn-sm btn-rounded" href="?t=1">First</a></li>
			<li class="'.$p.'">
				<a s class="btn btn-sm btn-primary" href="">Prev</a>
			</li>
			<li class="'.$v.'">
				<a class="btn btn-sm btn-primary" href="">Next</a>
			</li>
			<li><a class="btn btn-sm btn-rounded" href="?t='. $total_pages.'">Last</a></li>
		</ul>
	';
	print_r($res);
}


function text_limit($text,$limit){
	if (strlen($text) > $limit) {
		$trimstring = substr($text, 0, $limit). '&nbsp;...';
		} else {
		$trimstring = $text.'<br>';
		}
	return $trimstring;
}

function edate($date,$req){
	$date_timestamp = strtotime($date);
	$res = date($req, $date_timestamp);
	return $res;
}

function up_topic($id,$where,$size){
	global $conn;
	$s = "";
	if($size == 'sm'){
		$s = '4';
	}
	if($size == 'lg'){
		$s = '1';
	}
	$res = "";
	$query = mysqli_query($conn,"SELECT * FROM $where WHERE id='$id'");
	$dd = mysqli_fetch_array($query);
	$status = $dd['status'];
	if($status == "solved"){
		$res = '<h'.$s.' style="color: forestgreen;"><i class="fa fa-check-circle"></i></h'.$s.'>';
	} else {
		$res = '<h'.$s.' style="color: gray;"><i class="fa fa-check-circle"></i></h'.$s.'>';
	}
	return $res;
}

function loadComment(){
	global $conn;
	$res = "";
	$tid = $_GET['tid'];
	$counter = 0;
	$query = mysqli_query($conn,"SELECT * FROM topic_c WHERE tid='$tid'");
	$row = mysqli_num_rows($query);
	if($row != 0){
		while($dd = mysqli_fetch_assoc($query)){
			$res .= '
				<div class="card">
					<div class="row card-body">
						<div class="col-md-1 col-xs-2 col-sm-2">
							<div class="text-center">
								<i class="fa fa-chevron-up"></i><br>
								'.up_topic($tid,'topic_c','sm').'
								<i class="fa fa-chevron-down fa-lg"></i><br>
							</div>
						</div>
						<div class="col-md-11  col-xs-10 col-sm-10">
							<label><i class="fa fa-user-circle"></i>&nbsp;'.$dd['username'].'</label><br>
							<p><label><i class="fa fa-book"></i></label>&nbsp;&nbsp;'.$dd['description'].'</p>
							<pre class="codepen-able" data-type="html"><code>'.$dd['code'].'</code>
							</pre>
						</div>
					</div>
				</div>
			';
		}
	} else {
		$res = '
			<div class="card">
				<div class="row card-body">
					<div class="col-md-12  col-xs-12 col-sm-12">
						<div class="centering text-center">
							<h3>Hi! No Contributions currently</h3>
							<p class="lead">Be the first to comment and contribute to this post</p>
						</div>
					</div>
				</div>
			</div>
		';
	}
	print_r($res);
}

function addComment(){
	global $conn;
	
	$res = "";
	$cname = "";
	$cdesc = $_POST['cdescription'];
	$ccode = $_POST['ccode'];
	$ctid = $_POST['ctid'];
	
	if($_POST['cname']){
		$cname = $_POST['cname'];
	}else {
		$cname = $_SESSION['dev_user'];
	}
	$ft = mysqli_query($conn,"SELECT * FROM topic_d WHERE tid='$ctid'");
	$dd = mysqli_fetch_array($ft);
	$account = $dd['account'];
	
	$query = mysqli_query($conn,"INSERT INTO topic_c (username,description,code,tid,account) VALUES('$cname','$cdesc','$ccode','$ctid','$account')");
	if($query){
		$res = '
			<div class="card">
					<div class="row card-body">
						<div class="col-md-1 col-xs-2 col-sm-2">
						<div class="text-center">
							<i class="fa fa-chevron-up"></i><br>
							'.up_topic($ctid,'topic_c','sm').'
							<i class="fa fa-chevron-down fa-lg"></i><br>
						</div>
					</div>
					<div class="col-md-11  col-xs-10 col-sm-10">
						<label><i class="fa fa-user-circle"></i>&nbsp;'.$dd['username'].'</label><br>
						<p><label><i class="fa fa-book"></i></label>&nbsp;&nbsp;'.$dd['description'].'</p>
						<pre class="codepen-able" data-type="html"><code>'.$dd['code'].'</code>
						</pre>
					</div>
				</div>
			</div>
		';
		print_r($res);
	}
}
?>
