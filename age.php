<html>
<head>
<title> age calculator </title>
</head>
<?php
 $d = _POST['day'];
 $m = _POST['month'];
 $y = _POST['year'];
 
 $str = strtodate("today");
 $d1 = date("d",$str);
 $m1 = date("m",$str);
 $y1 = date("Y",$str);
 
 echo "your age is " .($y1 - $y);
?>
<body>
<form name = "frm" method = "post" action="">
enter Birth day:
<input type = "text" name = "day" i="day">
enter birth month:
<input type = "text" name = "month" i="month">
enter birth year:
<input type = "text" name = "year" i="year">
</form>
</body>
</html>
