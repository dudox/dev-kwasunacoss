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

$log = new _log();
?>
