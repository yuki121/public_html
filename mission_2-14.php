<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>MySQLテーブルデータ削除</title>
</head>
<body>

<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';

try{
	$dbh = new PDO($dsn, $user, $password);
	echo "<br />";

	if($dbh == null){
		echo "MySQLとの接続に失敗しました。<br />";
	}

	else{
		echo "MySQLとの接続に成功しました。<br />";
	}

	$dbh->query('SET NAMES utf8');
	echo "削除前のデータ一覧：<br />";
	$sql = 'select id, name from table1';
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $result['id'];
		echo $result['name']."<br />";
	}

	$sql = 'delete from table1 where id = :delete_id';
	$stmt = $dbh->prepare($sql);
	$flag = $stmt->execute(array(':delete_id' => 3));

	if($flag){
		echo "データの削除に成功しました。<br />";
	}

	else{
		echo "データの削除に失敗しました。<br />";
	}

	echo "削除後のデータ一覧：<br />";
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