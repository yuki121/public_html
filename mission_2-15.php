<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<link href = "mission_2-15_design.css" rel = "stylesheet" />
<title>掲示板</title>
</head>
<body>
<div class = "content">
<h1>掲示板</h1>
<h2>新規投稿</h2>
<form action = "mission_2-15_save.php" method = "post">
名前<br />
<input type = "text" name = "name" size = "25" maxlength = "10" value = "" placeholder = "未入力の場合「名無し」" /><br />
コメント<br />
<textarea name = "comment" cols = "60" rows = "4" maxlength = "200"></textarea><br />
<br />
<input type = "submit" value = "投稿" /><br />
</form>
<div class = "toukou">
<h2>投稿一覧</h2>
<div class = "foo">

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');
	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$sql = 'select num, name, comment, date from bbs7853';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $result['num']." ".$result['name']." ".$result['date']."<br />".$result['comment']."<br />"."<br />";
	}

}

catch(PDOException $e){
	echo "Error:".$e->getMessage();
	die();
}

$dbh = null;
?>

</div>
</div>
</div>
</body>
</html>