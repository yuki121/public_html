<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>MySQL接続テスト</title>
</head>
<body>

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
	$dbh = new PDO($dsn, $user, $password);
	echo "MySQLとの接続に成功しました。<br />\r\n";
	$dbh->query('SET NAMES utf8');
}

catch(PDOException $e){
	echo "Error:".$e->getMessage();
	die();
}

$dbh = null;
echo "MySQLとの切断に成功しました。<br />\r\n";
?>

</body>
</html>