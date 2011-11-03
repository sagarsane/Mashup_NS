<?php
//Start the session again so we can access the username
session_start();

//include the pusher publisher library
include_once 'Pusher.php';

$pusher = new Pusher(
	'5616a0515672fc92d46c', //APP KEY
	'952e17cf4699be91918e', //APP SECRET
	'9674' //APP ID
);

//get the message posted by our ajax call
$message = $_POST['message'];

//trim and filter it
$message = trim(filter_var($message, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES));

//wrap it with the user's name when we display
$message = "<strong>&lt;{$_SESSION['username']}&gt;</strong> {$message}";

//trigger the 'new_message' event in our channel, 'presence-nettuts'
$pusher->trigger(
	'presence-nettuts', //the channel
	'new_message', //the event
	array('message' => $message) //the data to send
);

//echo the success array for the ajax call
	
echo json_encode(array(
	'message' => $message,
	'success' => true
));
exit();
?>