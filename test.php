<?php
	$msg = "Hi SAGAR....";
	$params = array( 'action' => 'create', 
					 'token' => '086410b5705c344e8cc1b0bb042b6a4583cc689966ca86c36e59439e2c085db55a85eb0eacca6b9f6a60911f',
					'to' => '9196751528',
					 'msg' => $msg);
	$query = "http://api.tropo.com/1.0/sessions?" . http_build_query( $params );
	$xml = file_get_contents($query);
	echo $xml;
?>