<?php
session_start();

if(!isset($_SESSION['NAME'])){
	header('Location: mission_3-7_logout.php');
	exit();
}
?>
<?php
if(isset($_POST['name'],$_POST['comment'])){
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
	$comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
	$date = date('Y/m/d H:i:s');

	$dsn = 'データベース名';
	$user = 'ユーザー名';
	$password = 'パスワード';

	if($name == ''){
		$name = '名無し';
	}

	if($comment == ''){
		header('Location: mission_3-7_bbs_noform.php');
		exit();
	}

	else{

		try{
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query('SET NAMES utf8');
			$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$sql = "INSERT INTO bbs7896 ("."name, "."comment, "."date".") values ("."'".$name."', "."'".$comment."', "."'".$date."'".")";
			$stmt = $dbh->prepare($sql);
			$flag = $stmt->execute();
		}

		catch(PDOException $e){
			$errorMessage = 'データベースエラー';
		}

		header('Location: mission_3-7_bbs_save.php');
		$dbh = null;
		exit();

	}

}
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<meta name = "viewport" content = "width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=0.6, user-scalable=no" />
<link href = "mission_2-15.css" rel = "stylesheet" />
<title>投稿完了</title>
</head>
<body>
<h1>投稿完了</h1>

<?php
echo "投稿完了しました。<br />";
?>

<form action = "mission_3-7_bbs.php" method = "post">
<br />
<input type = "submit" value = "OK" /><br />
</form>
</body>
</html>