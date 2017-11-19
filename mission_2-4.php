<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>削除番号指定用フォーム</title>
</head>
<body>
<h1>削除番号の入力</h1>
<form action = "mission_2-4.php" method = "post">
削除対象番号：<br />
<input type = "text" name = "delete" size = "30" value = "" /><br />
<br />
<input type = "submit" value = "削除" />
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	writeData();
}

function writeData(){
	$delete = $_POST['delete'];
	$filename = 'mission_2-2_formdata.txt';
	$readfile = file($filename);
	$fp  = fopen($filename,'w');
		for($i = 0; $i < count($readfile); $i++){
			$formdata = explode("<>",$readfile[$i]);
			flock($fp, LOCK_EX);
				if($formdata[0] != $delete){
					fwrite($fp, $readfile[$i]);
				}
				else{
					$str = $delete.'<>'."削除しました。".'<>'."削除しました。".'<>'.$formdata[3];
					fwrite($fp,$str);
				}
		}
	flock($fp, LOCK_UN);
	fclose($fp);
}
?>

</body>
</html>
