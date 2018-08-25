<?php
require_once("config.php");
class _log {
	function _user($param){
		global $conn;
		$query = mysqli_query($conn,"SELECT * FROM users WHERE email='".$_SESSION['dev_user']."' or username='".$_SESSION['dev_user']."'");
		$dd = mysqli_fetch_array($query);
		$res = $dd[$param];
		return $res;
	} 
}

class topic{
	function r_topic($status,$id){
		global $conn;
		$res = "";
		$req = mysqli_query($conn,"SELECT * FROM topic_d WHERE id='$id'");
		$row = mysqli_fetch_array($req);
		$param = $row['related'];
		$query = mysqli_query($conn,"SELECT * FROM topic_d WHERE related='$param' and id != $id");
		while($dd = mysqli_fetch_assoc($query)){
			$res = '
				<label style="font-size: 11px;"><a href="single?t='.$dd['id'].'"><i class="fa fa-info"></i>&nbsp;'.$dd['title'].'</a></label>
			';
			print_r($res);
		}
	}
	
	
	function seen_topic($id){
		global $conn;
		$up = 1;
		$query = mysqli_query($conn,"SELECT * FROM topic_d WHERE id='$id'");
		$dd = mysqli_fetch_array($query);
		$seen = $dd['seen'];
		$up += $seen;
		$update = mysqli_query($conn,"UPDATE topic_d set seen='$up' WHERE id='$id'");
	}
	
	
	function p_topic(){
		global $conn;
		$limit = "";
		$counter = 1;
		$res = "";
		$query = mysqli_query($conn,"SELECT * FROM topic_d ORDER BY seen DESC LIMIT 7");
		while($dd = mysqli_fetch_assoc($query)){
			$text = $dd['title'];
			$limit = text_limit($text,50);
			$counter += 1;
			if($counter <= 4){
				$active = "active";
			}
			else {
				$active = "";
			}
			$res .= '
			<div class="col-lg-3 col-xs-12 col-sm-12 carousel-item '.$active.'">
				<div class="">
					<div class="card">
						<div class="card-body">
							<label><a href="topic/single?t='.$dd['id'].'"><small>'.$limit.'</small></a></label>
							<p style="font-size: 13px; color: #000;"><i class="fa fa-star"></i>&nbsp;'.$dd['star'].'&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;'.$dd['seen'].'&nbsp;&nbsp;<span class="badge badge-success"><i class="fa fa-check-circle">&nbsp;</i>solved</span></p>
						</div>
					</div>
				</div>
			</div>
			';
		}
		print_r($res);
	}
	
	function all_topic(){
		global $conn;
		$query = mysqli_query($conn,"SELECT * FROM topic");
	}
		
	
	function d_topic($id,$param){
		global $conn;
		$query = mysqli_query($conn,"SELECT * FROM topic_d WHERE id='$id'");
		$dd = mysqli_fetch_array($query);
		if($param == 'date'){
			$date = $dd['date'];
			$res = edate($date,'d M , Y');
			return $res;
			
		}
		$res = $dd[$param];
		return $res;
	}
	
	function tcomment_c($id){
		global $conn;
		$counter = 0;
		$query = mysqli_query($conn,"SELECT * FROM topic_c WHERE tid='$id'");
		while($dd = mysqli_fetch_assoc($query)){
			$counter += 1;
		}
		print_r($counter);
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
	
	function s_topic($id,$where){
		global $conn;
		$res = "";
		$up = "";
		$query = mysqli_query($conn,"SELECT * FROM $where WHERE id='$id'");
		$dd = mysqli_fetch_array($query);
		$status = $dd['status'];
		if($status == "solved"){
			$res = '
				<span class="badge badge-success"><i class="fa fa-check-o"></i>&nbsp;Solved&nbsp;</span>
			';
		}else if($status == "unsolved"){
			$res = '
				<span style="color: #fff;" class="badge badge-warning"><i class="fa fa-times"></i>&nbsp;Unsolved&nbsp;</span>
			';
			$up = '
				<h1 style="color: gray;"><i class="fa fa-check-circle"></i></h1>
			';
		}
		return $res;
	}
}

function text_limit($text,$limit){
	if (strlen($text) > $limit) {
		$trimstring = substr($text, 0, $limit). '&nbsp;...';
		} else {
		$trimstring = $text;
		}
	return $trimstring;
}
function edate($date,$req){
	$date_timestamp = strtotime($date);
	$res = date($req, $date_timestamp);
	return $res;
}

$log = new _log();
$topic = new topic();
?>
