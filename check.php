<?php

 $d = $_POST['day'];
 $m = $_POST['month'];
 $y = $_POST['year'];
 
 $str = strtotime("Nov 6 2016");
 
 $d1 = date("d",$str);
 $m1 = date("m",$str);
 $y1 = date("Y",$str);
 
 if($y > $y1){
	 echo "<h2>you're not born yet!</h2>";
 }

 else{
	 if( $m == $m1){
		 if($d >= $d1){
		 echo "<h2>your age is " .($y1 - $y) ." years and " .($m1 - $m)." months and " .($d - $d1). " days</h2>";
		 }
		 else{
			echo "<h2>your age is " .($y1 - $y) ." years and " .($m1 - $m)." months and " .($d1 - $d). " days</h2>"; 
		 }
	 }
	 else if($m1 > $m){
	 $str1 = strtotime(" -1 months");	 
	 $lastMonth = date("t",$str1) - $d;
	 $lastMonth += $d1;
	 echo "<h2> your age is " .($y1 - $y) ." years " .($m1 - $m - 1)." months and " .$lastMonth. " days.<h2>";
	 }
	 else{
	 $str1 = strtotime(" -1 months");	 
	 $lastMonth = date("t",$str1) - $d;
	 $lastMonth += $d1;
	 echo "<h2> your age is " .($y1 - $y) ." years " .($m - $m1)." months and " .$lastMonth. " days.<h2>";
	 }
}
 
?>