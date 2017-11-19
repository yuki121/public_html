<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>フォーム</title>
</head>
<body>
<h1>フォームデータの入力</h1>
<form action = "mission_2-6_data.php" method = "post">
名前：<br />
<input type = "text" name = "name" size = "30" value = "" /><br />
コメント：<br />
<textarea name = "comment" cols = "30" rows = "5"></textarea><br />
パスワード：<br />
<input type = "text" name = "password" size = "30" value = "" /><br />
<br />
<input type = "submit" value = "送信" />
</form>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	writeData();
}

function writeData(){
	$filename = 'mission_2-6_formdata.txt';

	if(file_exists($filename)){
		$lines    = file($filename);
		$lastLine = count($lines) + 1;
	}

	else{
		touch($filename);
		$lastLine = 1;
	}

	$str = $lastLine.'<>'.$_POST['name'].'<>'.$_POST['comment'].'<>'.$_POST['password'].'<>'.date('Y-m-d H:i:s')."\r\n";
	$fp  = fopen($filename,'a');

	if(flock($fp, LOCK_EX)){
		fwrite($fp, $str);
		flock($fp, LOCK_UN);
	}

	fclose($fp);

}
?>

</body>
</html>