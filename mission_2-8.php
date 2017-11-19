<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>MySQLテーブル作成</title>
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
	$sql = "CREATE TABLE table1 (id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,name varchar(20) NOT NULL)";

	if($dbh->exec($sql)){
		echo "Table:table1の作成に成功しました。<br />\r\n";
	}

	else{
		echo "Table:table1の作成に失敗しました。<br />\r\n";
		var_dump($dbh->errorInfo());
		echo "<br />\r\n";
	}
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