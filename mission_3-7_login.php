<?php
if(isset($_COOKIE['bbshash'])){
	$hash = $_COOKIE['bbshash'];
	$salt = '文字列';

	if($hash != $salt){
		header('Location: mission_3-9_registration_mail_form.php');
		exit();
	}

}

else{
	header('Location: mission_3-9_registration_mail_form.php');
	exit();
}
?>
<?php
session_start();

$db['host'] = 'localhost';
$db['user'] = 'ユーザー名';
$db['pass'] = 'パスワード';
$db['dbname'] = 'データベース名';

$errorMessage = "";

if(isset($_POST['login'])){
	if(empty($_POST['id'])){
		$errorMessage = 'IDが未入力です。';
	}

	else if(empty($_POST['password'])){
		$errorMessage = 'パスワードが未入力です。';
	}

	if(!empty($_POST['id']) && !empty($_POST['password'])){
		$id = $_POST['id'];
		$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

		try{
			$pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			$stmt = $pdo->prepare('SELECT * FROM userdata7896 WHERE id = ?');
			$stmt->execute(array($id));
			$password = $_POST['password'];

			if($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				if(crypt($password, $row['password']) === $row['password']){
					session_regenerate_id(true);

					$id = $row['id'];
					$sql = "SELECT * FROM userdata7896 WHERE id = $id";
					$stmt = $pdo->query($sql);

					foreach($stmt as $row){
						$row['name'];
					}

					$_SESSION['NAME'] = $row['name'];
					header('Location: mission_3-7_bbs.php');
					$pdo = null;
					exit();
				}

				else{
					$errorMessage = 'ID、あるいは、パスワードに誤りがあります。';
				}

			}

			else{
				$errorMessage = 'ID、あるいは、パスワードに誤りがあります。';
			}

		}

		catch(PDOException $e){
			$errorMessage = 'データベースエラー';
		}

	}

}
$pdo = null;
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<meta name = "viewport" content = "width=device-width, initial-scale=0.6, minimum-scale=0.6, maximum-scale=0.6, user-scalable=no" />
<link href = "mission_2-15.css" rel = "stylesheet" />
<title>ログイン</title>
</head>
<body>
<h1>ログイン</h1>
<form id = "loginform" name = "loginform" action = "" method = "post">
<fieldset>
<legend>ログインフォーム</legend>
<div><font color = "#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>
<label for = "id">ID</label><br /><input type = "text" id = "id" name = "id" maxlength = "10" placeholder = "IDを入力" value = "<?php if(!empty($_POST['id'])){echo htmlspecialchars($_POST['id'], ENT_QUOTES);} ?>" />
<br />
<label for = "password">パスワード</label><br /><input type = "password" id = "password" name = "password" maxlength = "20" value = "" placeholder = "パスワードを入力" />
<br />
<br />
<input type = "submit" id = "login" name = "login" value = "ログイン" />
<br />
<br />
</fieldset>
</form>
<br />
<form action = "mission_3-7_signup.php" method = "post">
<fieldset>
<legend>新規登録フォーム</legend>
<br />
<input type = "submit" value = "新規登録フォームに移動" />
<br />
<br />
</fieldset>
</form>
</body>
</html>