<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>フォーム</title>
</head>
<body>
<h1>フォームデータの入力</h1>
<form action = "mission_2-1.php" method = "post">
名前：<br />
<input type = "text" name = "name" size = "30" value = "" /><br />
コメント：<br />
<textarea name = "comment" cols = "30" rows = "5"></textarea><br />
<br />
<input type = "submit" value = "送信" />
</form>

<?php
$name = $_POST['name'];
$comment = $_POST['comment'];
$data = $data.$name."<br />\r\n";
$data = $data.$comment."<br />\r\n";
echo htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
?>

</body>
</html>