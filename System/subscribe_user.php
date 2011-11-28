<?php
	require "init_DB.php";
	$user = $_POST['user'];
	$phone = $_POST['pno'];
	$university = $_POST['university'];
	$option = $_POST['type'];
	//echo $option;
	$opt=0;
	if($option == "Send me a Notification SMS"){
		$opt = 0;
		$notif = "You will get a Notification about <b>". $university. " </b> whenever someone Chats about it in our Chat room! You will then be able to Login to our chat room and view the content.";
	}
	else{
		$opt = 1;
		$notif = "You will get a detailed Information about <b>". $university. " </b> whenever someone Chats about it in our Chat room!";
		
	}	

	$q = "insert into `profiles` values('" .$user. "',". "'".$phone. "',"."'".$university."',".$opt.")";
	mysql_query($q) or die('Error, query failed : ' . mysql_error());
	echo "<hr></hr>
		   <span>You are subscribed to our System!. ".$notif." </span>
		   <hr></hr>";
?>