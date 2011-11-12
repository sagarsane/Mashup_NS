<?php

	require 'init_DB.php';
	
	$q = 'select * from `MashupNS`.`profiles`';
	$res = mysql_query($q) or die('Error, query failed : ' . mysql_error());
	$the_file = file_get_contents("log.txt");
	while( $row = (mysql_fetch_row( $res ) ))
	{
		$text_to_msg = extract_for_current_profile( $row , explode("|", $the_file));
		send_SMS($row, $text_to_msg);
	}
	
	
	function extract_for_current_profile( $row , $logs){
		$to_return = "";
		$i = 0;
		while($i != count($logs)){
			if(strstr($logs[$i], $row[2])){
				if($row[3] == 1) // send SMS 
				{
					$to_return .= $logs[$i]. "#";
				}
				else{
					$to_return = "someone is talking about your subscription about " . $row[2] ." check out our website :)";
					return $to_return;
				}
			}
			$i++;
		}
		return $to_return;
	}
	
	function send_SMS($row, $text_to_msg){
	
		$msg = "Hi there, ". $row[0] . " we found a hit for your subscription :). Here it goes:- '". $text_to_msg. "'";
		$params = array( 'action' => 'create', 
					 'token' => '086410b5705c344e8cc1b0bb042b6a4583cc689966ca86c36e59439e2c085db55a85eb0eacca6b9f6a60911f',
					'to' => $row[1],
					'msg' => $msg);
		$query = "http://api.tropo.com/1.0/sessions?" . http_build_query( $params );
		$xml = file_get_contents($query);
		//echo $xml;
	}
	
?>