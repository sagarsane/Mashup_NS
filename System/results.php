<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mash-up Search</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
</head>
<script src="../YoutubeFiles/video_browser.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true" ></script>
<script type="text/javascript" src ="mapGeneric.js"></script>
<script src="../jquery.phono.js"></script>
    
	<script>
	var phono = $.phono({
        apiKey: "e801a843171995275c37ab13a2847bf4",
        onReady: function() {
          $("#call").attr("disabled", false).val("Call " + input_f.value + "'s helpline");
        }
      });

      //$("#call").click(function() {
	  function call_helpline(number,id){
	  var num = String(number);
        $("#call"+id).attr("disabled", true).val("Busy");
        phono.phone.dial(num, {
          onRing: function() {
            $("#status").html("Ringing");
          },
          onAnswer: function() {
            //$("#status").html("Answered");
          },
          onHangup: function() {
            $("#call"+id).attr("disabled", false).val("Call");
            $("#status").html("Hangup");
          }
        });
	  
	   }
	
	
	</script>
    
<style type="text/css">
 
</style>
<body bgcolor="#FFFFFF" align="center">
<table bgcolor="#FFFFFF" id="query">
  <tr align="center">
    <td><input id="input_f" type="text" name="input_f" size="40"/></td>
	<td>
	<button type="button" name="button" onclick="send()">Search</button>
	</td>
  </tr>

  <tr>
    <td><input name="top10" id="top10"  type="checkbox" value="Top10"/> Top 10 Universities</td>
    <td><input type="checkbox"/> Top 30 Universities</td>
  </tr>
  <tr>
    <td><input name="cs" id="cs" type="checkbox" value="CS"/> Computer Science</td>
    <td><input  type="checkbox"/> Electrical and Computer Engineering</td>
  </tr>
</table>
<div id="results"/>
</body>
</html>