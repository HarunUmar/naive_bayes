<html>
<head>
<title>Percobaan JavaScript</title>
<script language="javascript">
	
<!--
var timerID=null;
var timerRunning=false;
function stopclock (){
if (timerRunning)
clearTimeout(timerID);
timerRunning=false;
}
	
function startclock () {
stopclock();
showtime();
}
	
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds();
var timeValue = " " + ((hours>12) ? hours -12 : hours)
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M.":" A.M."
DateTime.innerHTML = timeValue;
<!--document.clock.face.value=timeValue;-->
timerID = setTimeout("showtime()" ,1000);
timerRunning=true;
}
	<!--end-->
	
</script>
</head>
	
<body topmargin=0 leftmargin="0" marginheight="0" marginwidth="0" onLoad="startclock()" text="#000">
<?php include "date.php"; 
 echo "<font face=verdana color='#000' style='font-weight:bold;font-size:11px;'>$sekarang </font>"; ?>
- <font id="DateTime" face="verdana" color="#000" style="font-weight:bold;font-size:11px;"  ></font>
</body>
</html>
