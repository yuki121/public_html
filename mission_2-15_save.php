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
		header('Location: mission_2-15_noform.php');
		exit();
	}

	else{
		try{
			$dbh = new PDO($dsn, $user, $password);
			$dbh->query('SET NAMES utf8');
			$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$sql = "insert into bbs7853 ("."name, "."comment, "."date".") values ("."'".$name."', "."'".$comment."', "."'".$date."'".")";
			$stmt = $dbh->prepare($sql);
			$flag = $stmt->execute();
		}

		catch(PDOException $e){
			echo "Error:".$e->getMessage();
			die();
		}

		$dbh = null;

	}

}
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<link href = "mission_2-15.css" rel = "stylesheet" />
<title>投稿完了</title>
</head>
<body>
<h1>投稿完了</h1>

<?php
echo "投稿完了しました。<br />";
?>

<form action = "mission_2-15.php" method = "post">
<br />
<input type = "submit" value = "OK" /><br />
</form>
</body>
</html>