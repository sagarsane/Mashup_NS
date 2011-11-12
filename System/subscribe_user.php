<?php
	require "init_DB.php";
	$user = $_POST['user'];
	$phone = $_POST['pno'];
	$university = $_POST['university'];
	$option = $_POST['type'];
	$q = "insert into `profiles` values('" .$user. "',". "'".$phone. "',"."'".$university."',".$option.")";
	mysql_query($q);
?>