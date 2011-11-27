<?php	
	require 'init_DB.php';
	function getResults_($row,$i)
	{
		//$name = addslashes($row[1]);
		
		//$name= (object)$name1;
		
		print '<br/> <br/>';
		print '<div id="list_u'.$i.'" align="center">
				<table border="1" width="80%" height="20%">
				<tr>
					<td>
					<table align="center">
					<tr>
						<td>
						<a href="indivi.html?city='.$row[2].'&fees='.$row[3].'&link='.$row[4].'&gre='.$row[5].'"><h2>Rank: '.$row[0].' - '.$row[1].'</h2></a>
						</td>
					</tr>
					</table>
					<table align="center">
					<tr>
						<td align="center" >
						<img src="YouTube-Logo.jpg" height="30" width="100" />
						</td>
						<td width="30"></td>
						<td align="center">
						<img src="news.jpg" height="30" width="100"/>
						</td>
						<td width="30"></td>
						<td align="center">
						<button name="call'.$i.'" id="call'.$i.'" height="30" width="100" onclick = "call_helpline('.$row[6].','.$i.')">Call Helpline: '.$row[6].'</button>
						</td>
						<td width="30"></td>
						<td align="center">
						<a href="subscribe.html?univ_name='.$row[1].'" onclick="return popitup("subscribe.html")" >Subscribe</a>
						</td>
						<td align="center">
						
						</td>
					</tr>
					</table>
					</td>
					<td height="100" width="200" id="mapdiv'.$i.'" align = "center">
					<img src="maps.jpg" height="30" width="100" onclick = "initialize_map('.$i.',&quot;'.$row[1].'&quot;)"/>
					</td>
				</tr>
			</table>
			</div>';
	}
	
	$q ="";
	
	if($_POST['top10']==1 && $_POST['cs']==0)//only top10
	{
		$q = "select * from `university_db` where `rank` between 1 and 10";
	}
	else if($_POST['top10'] == 0 && $_POST['cs'] == 1) // only CS
	{
		$q = "select * from `university_db` where `dept` = '1'";
	}
	else if($_POST['top10'] == 1 && $_POST['cs'] ==1 )//both
	{
		$q = "select * from `university_db`  where (`rank` between 1 and 10) and (`dept` = 1)";
	}	
	$res = mysql_query($q) or die('Error, query failed : ' . mysql_error());
	$i = 0;
	while( $row = (mysql_fetch_row( $res ) )){
			getResults_($row,$i);
			$i++;
	}	
	
?>