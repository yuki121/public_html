<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>MySQLテーブルデータ更新</title>
</head>
<body>

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
	$dbh = new PDO($dsn, $user, $password);

	if($dbh == null){
		echo "MySQLとの接続に失敗しました。<br />";
	}

	else{
		echo "MySQLとの接続に成功しました。<br />";
	}

	$dbh->query('SET NAMES utf8');
	echo "更新前のデータ一覧：<br />";
	$sql = 'select id, name from table1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $result['id'];
		echo $result['name']."<br />";
	}

	$sql = 'update table1 set name = ? where id = ?';
	$stmt = $dbh->prepare($sql);
	$flag = $stmt->execute(array('佐藤', 3));

	if($flag){
		echo "データの更新に成功しました。<br />";
	}

	else{
		echo "データの更新に失敗しました。<br />";
	}

	echo "更新後のデータ一覧：<br />";
	$sql = 'select id, name from table1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $result['id'];
		echo $result['name']."<br />";
	}

}

catch(PDOException $e){
	echo "Error:".$e->getMessage();
	die();
}

$dbh = null;
echo "MySQLとの切断に成功しました。<br />";
?>

</body>
</html>