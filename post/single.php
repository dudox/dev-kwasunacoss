<?php 
include("../src/classes.php");
if(isset($_SESSION['dev_user'])){
	echo "<script>window.open('./acount/','_SELF')</script>";
}
$page_title = "Developer | Home";
include("../src/inc/_header.php");
?>




<?php 
include("../src/inc/_footer.php")
?>
