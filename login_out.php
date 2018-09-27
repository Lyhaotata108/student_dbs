<?php 
	session_start();
	unset($_SESSION['usname']);
	header("Refresh:0;url=logon.php");
 ?>
