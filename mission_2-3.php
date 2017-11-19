<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>フォーム</title>
</head>
<body>
<h1>フォームデータの入力</h1>
<form action = "mission_2-3.php" method = "post">
名前：<br />
<input type = "text" name = "name" size = "30" value = "" /><br />
コメント：<br />
<textarea name = "comment" cols = "30" rows = "5"></textarea><br />
<br />
<input type = "submit" value = "送信" /><br />
<br />
</form>

<?php
$filename = 'mission_2-2_formdata.txt';

if(file_exists($filename)){
	$readfile = file($filename);
	for($i = 0; $i < count($readfile); $i++){
		$formdata = explode("<>",$readfile[$i]);
		echo $formdata[0]." ".$formdata[1]." ".$formdata[2]." ".$formdata[3]."<br />";
	}
}

else{
	echo "投稿がありません。<br />";
}
?>

</body>
</html>