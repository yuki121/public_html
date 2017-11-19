<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>フォーム</title>
</head>
<body>
<h1>フォームデータの入力</h1>
<form action = "mission_1-6.php" method = "post">
名前：<br />
<input type = "text" name = "name" size = "30" value = "" /><br />
メールアドレス：<br />
<input type = "text" name = "mail" size = "30" value = "" /><br />
コメント：<br />
<textarea name = "comment" cols = "30" rows = "5"></textarea><br />
<br />
<input type = "submit" value = "送信" />
</form>

<?php
$name = $_POST['name'];
$mail = $_POST['mail'];
$comment = $_POST['comment'];
$data = $data."<p>名前:".$name."</p>\r\n";
$data = $data."<p>メールアドレス:".$mail."</p>\r\n";
$data = $data."<p>コメント:".$comment."</p>\r\n";
$filename = 'mission_1-6_formdata.txt';
$fp = fopen($filename, 'a');
fwrite($fp, $data);
fclose($fp);
?>

</body>
</html>