<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>MySQLテーブルデータ表示</title>
</head>
<body>

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
	$dbh = new PDO($dsn, $user, $password);

	if($dbh == null){
		echo "MySQLとの接続に失敗しました。<br />\r\n";
	}

	else{
		echo "MySQLとの接続に成功しました。<br />\r\n";
	}

	$dbh->query('SET NAMES utf8');
	echo "テーブルデータ表示:<br />\r\n";
	$sql = 'select id, name from table1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $result['id'];
		echo $result['name']."<br />\r\n";
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