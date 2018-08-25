

<?php
include("../../src/config.php");

$function = $_POST['function'];
switch($function){
	case 'topic-new':
		topicNew();
		break;
}

function topicNew(){
	global $conn;
	
	$title = $_POST['topic-title'];
	$disName = $_POST['topic-dis-name'];
	$mailer = $_POST['ch'];
	$tdesc = $_POST['topic-description'];
	$code = $_POST['topic-code'];
	$tag = $_POST['topic-tag'];
	$tid = "tid".mt_rand(100000000000000,999999999999999);
	if($disName == ""){
		$disName = $_SESSION['dev_user'];
	}
	$query = mysqli_query($conn,"INSERT INTO topic_d (username,title,description,code,attrib,account,related,date,tid,mailer) VALUES('$disName','$title','$tdesc','$code','$tag','".$_SESSION['dev_user']."','$tag','NOW()','$tid','$mailer')");
	if($query){
		print_r("success");
	}
	
}

?>
