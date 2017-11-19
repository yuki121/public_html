<?php
$filename = "mission_1-6_formdata.txt";
$ret_array = file($filename);
for($i = 0; $i < count($ret_array); ++$i){
	echo($ret_array[$i]."<br />\r\n");
}
?>