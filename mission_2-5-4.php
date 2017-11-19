<?php
if(isset($_POST['name'],$_POST['comment'],$_POST['num'])){
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$num = $_POST['num'];
	$filename = 'mission_2-2_formdata.txt';
	$readfile = file($filename);
	$fp  = fopen($filename,'w');

	for($i = 0; $i < count($readfile); $i++){
		$formdata = explode("<>",$readfile[$i]);
		flock($fp, LOCK_EX);

		if($formdata[0] != $num){
			fwrite($fp, $readfile[$i]);
		}

		else{
			$str = $num.'<>'.$name.'<>'.$comment.'<>'.$formdata[3];
			fwrite($fp, $str);
		}
	}

	flock($fp, LOCK_UN);
	fclose($fp);

}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>編集完了</title>
</head>
<body>
<h1>編集完了</h1>

<?php
echo "編集完了しました。"."<br />\r\n";
?>

</body>
</html>