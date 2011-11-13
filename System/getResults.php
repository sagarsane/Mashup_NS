<?php

	$searchTerm = $_POST['searchTerm'];
	$i = 0;
	for($i = 0; $i < 5;$i++)
		getResults($i);
	
	function getResults($i){
	print '<br/> <br/>';
	print '<div id="list_u'.$i.'" align="center">
			<table border="1" width="80%" height="20%">
				<tr>
					<td>
					<table align="center">
					<tr>
						<td>
						<a href="indivi.html"><h2>North Carolina State University</h2></a>
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
						<img src="helpline.jpg" height="30" width="100"/>
						</td>
						<td width="30"></td>
						<td align="center">
						<a href="subscribe.html" onclick="return popitup("subscribe.html")" >Subscribe</a>
						</td>
						<td align="center">
						
						</td>
					</tr>
					</table>
					</td>
					<td height="100" width="200" id="mapdiv'.$i.'" align = "center">
					<img src="maps.jpg" height="30" width="100" onclick = "initialize('.$i.')"/>
					</td>
				</tr>
			</table>
			</div>';
	}
?>