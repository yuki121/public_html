<?php
$link = mysql_connect('localhost', 'ユーザー名', 'パスワード');

mysql_select_db('データベース名');

//投稿の時
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_input']) && $_POST['message'] != "" && $_POST['password_input'] != ""){
	$user = $_POST['user'];
	$message = $_POST['message'];

	if($user==""){
		$user="名無し";
	}

	$Commnet_number=1;
	$sql = sprintf("SELECT MAX(Comment_number) FROM images0000");

	$result_flag = mysql_query($sql);
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	$Comment_number = $row[0];

	$Comment_number++;
	$postedAt = date('Y/m/d H:i:s');
	$password = $_POST['password_input'];
	$extension = upload();

	if($extension === "pdf" || $extension === "bmp" || $extension ===  "png" || $extension ===  "gif" || $extension ===  "jpeg" || $extension === "jpg"){
		$sql = sprintf("INSERT INTO images0000 (Comment_number, User, Comment, Time, Password, File_type, File_path) VALUES (%d, %s, %s, %s, %s, %s, %s)", quote_smart($Comment_number), quote_smart($user), quote_smart($message), quote_smart($postedAt), quote_smart($password), quote_smart("画像"), quote_smart("http://co-745.it.99sv-coco.com/files/" . $_FILES["upfile"]["name"]));
	}

	else if($extension === "wmv" || $extension === "avi" || $extension === "mpeg" || $extension === "divx" || $extension === "rm" || $extension === "mpg" || $extension === "flv" || $extension === "mp4"){
		$sql = sprintf("INSERT INTO images0000 (Comment_number, User, Comment, Time, Password, File_type, File_path) VALUES (%d, %s, %s, %s, %s, %s, %s)", quote_smart($Comment_number), quote_smart($user), quote_smart($message), quote_smart($postedAt), quote_smart($password), quote_smart("動画"), quote_smart("http://co-745.it.99sv-coco.com/files/" . $_FILES["upfile"]["name"]));
	}

	$result_flag = mysql_query($sql);

}

//削除の時
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_number']) && $_POST['password_delete'] != ""){
	$quryset = mysql_query("SELECT * FROM images0000");

	while($data = mysql_fetch_array($quryset)){

		if($_POST['delete_number'] == $data[0] && $_POST['password_delete'] == $data[4]){
			$sql = sprintf("DELETE FROM images0000 WHERE Comment_number = %d", quote_smart($data[0]));
			$result_flag = mysql_query($sql);

		}

	}

}

//編集の時
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_edit']) && $_POST['password_edit'] != ""){
	$quryset = mysql_query("SELECT * FROM images0000");

	while($data = mysql_fetch_array($quryset)){

		if($_POST['edit_number'] == $data[0] && $_POST['password_edit'] == $data[4]){
			$edit_user = $data[1];
			$edit_message = $data[2];
		}

	}

}

//投稿フォームが編集モードの時
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_mode']) && $_POST['password_input'] != ""){
	$edit_user = $_POST['user'];
	$edit_message = $_POST['message'];
	$edit_number = $_POST['edit_mode'];
	$postedAt = date('Y/m/d H:i:s');

	$quryset = mysql_query("SELECT * FROM images0000");

	while($data = mysql_fetch_array($quryset)){

		if($edit_number == $data[0] && $_POST['password_input'] == $data[4]){
			$sql = sprintf("UPDATE images0000 SET User = %s,Comment = %s,Time = %s WHERE Comment_number = %d", quote_smart($edit_user), quote_smart($edit_message), quote_smart($postedAt), quote_smart($data[0]));
			$result_flag = mysql_query($sql);
		}

	}

}

$sql = "SELECT COUNT(*) FROM images0000";
$result_flag = mysql_query($sql);
$res = mysql_query($sql);
$row = mysql_fetch_array($res);
$data_count = $row[0];

$quryset = mysql_query("SELECT * FROM images0000 ORDER BY Comment_number DESC");

function upload(){
	if(is_uploaded_file($_FILES["upfile"]["tmp_name"])){
		if(move_uploaded_file($_FILES["upfile"]["tmp_name"], "./" . $_FILES["upfile"]["name"])){
			chmod("./" . $_FILES["upfile"]["name"], 0777);
			$file_nm = $_FILES['upfile']['name'];
			$tmp_ary = explode('.', $file_nm);
			$extension = $tmp_ary[count($tmp_ary)-1];
			return $extension;
		}

	}

}

function h($s){
	return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

function quote_smart($value){

	if(!is_numeric($value)){
		$value = "'" . mysql_real_escape_string($value) . "'";
	}

	return $value;
}
?>
<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<meta name = "robots" content = "noindex, nofollow, noarchive" />
<link href = "mission_2-15_design.css" rel = "stylesheet" />
<title>掲示板</title>
</head>
<body>
<h1>掲示板</h1>
<h2>新規投稿</h1>
	<fieldset>
	<form action = "" method = "post" enctype = "multipart/form-data">
		<?php if(isset($_POST['submit_edit'])):?>
			名前<br /><input type = "text" name = "user" size = "25" maxlength = "10" value = "<?php echo $edit_user;?>" placeholder = "未入力の場合「名無し」" />
			<br />
			コメント<br /><textarea name = "message" cols = "60" rows = "4" maxlength = "200"><?php echo $edit_message;?></textarea>
			<br />
			パスワード<br /><input type = "password" name = "password_input" size = "25" maxlength = "10" />
			<input type = "hidden" name = "edit_mode" value = "<?=h($edit_number)?>" />
		<?php else:?>
			名前<br /><input type = "text" name = "user" size = "25" maxlength = "10" value = "<?php echo $GLOBALS['id'];?>" placeholder = "未入力の場合「名無し」" />
			<br />
			コメント<br /><textarea name = "message" cols = "60" rows = "4" maxlength = "200"></textarea>
			<br />
			パスワード<br /><input type = "password" name = "password_input" size = "25" maxlength = "10" />
		<?php endif;?><br />
		<input type = "hidden" name = "MAX_FILE_SIZE" value = "20000000" />
		アップロードファイル<br />
		<input type = "file" name = "upfile" size = "30" />
		<br />
		<br />
		<input type = "submit" name = "submit_input" value = "投稿" />
	</form>
	</fieldset>
	<h2>投稿削除</h2>
	<fieldset>
	<form action = "" method = "post">
		削除対象番号<br /><input type = "number" name = "delete_number" size = "25" maxlength = "10" />
		<br />
		パスワード<br /><input type = "password" name = "password_delete" size = "25" maxlength = "10" />
		<br />
		<br />
		<input type = "submit" name = "submit_delete" value = "削除" />
	</form>
	</fieldset>
	<h2>投稿編集</h2>
	<fieldset>
	<form action = "" method = "post">
		編集対象番号<br /><input type = "number" name = "edit_number" size = "25" maxlength = "10" />
		<br />
		パスワード<br /><input type = "password" name = "password_edit" size = "25" maxlength = "10" />
		<br />
		<br />
		<input type = "submit" name = "submit_edit" value = "編集" />
	</form>
	</fieldset>
	<h2>投稿一覧（<?php echo $data_count;?>件）</h2>
		<?php if($data_count > 0):?>
			<?php while ($data = mysql_fetch_array($quryset)):?>
				<?php if($data[5] == "画像"):?>
					<?php echo h($data[0]);?> <?php echo h($data[1]);?> <?php echo h($data[3]);?><br /><?php echo h($data[2]);?><br /><?php echo "<img src = $data[6] alt = \"表示できません。\">";?><br /><br />
				<?php elseif($data[5] == "動画"):?>
					<?php echo h($data[0]);?> <?php echo h($data[1]);?> <?php echo h($data[3]);?><br /><?php echo h($data[2]);?><br /><?php echo "<video src = $data[6]></video>";?><br /><br />
				<?php endif;?>
			<?php endwhile; ?>
		<?php else:?>
		投稿がありません。
		<?php endif;?>
</body>
</html>