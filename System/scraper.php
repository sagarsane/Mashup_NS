<?php

	require 'init_DB.php';
	$file = fopen("log.txt", "r");
	while(!feof($file)){
		$arow = fgets($file);
		
		$columns = explode("|",$arow);
		$i = 0;
		//echo count($columns);
		if(count($columns) != 1){
			$q = "insert into `MashupNS`.`logTable` values(";
		while($i != count($columns)){
				if($i != count($columns)-1)
				$q .= $columns[$i].",";
				else
				$q .= $columns[$i];
				$i++;
		}
		
		$q .= ")";
		echo "$q<br/>";
		//mysql_query($q) or die('Error, query failed : ' . mysql_error());
		
		}
		
		
	}
	
	
?>