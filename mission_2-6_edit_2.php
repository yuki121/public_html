<?php
if(isset($_POST['edit'])){
	$edit = $_POST['edit'];
	$filename = 'mission_2-6_formdata.txt';
	$readfile = file($filename);

	for($i = 0; $i < count($readfile); $i++){
		$formdata = explode("<>",$readfile[$i]);

		if($formdata[0] == $edit){
			$name = $formdata[1];
			$comment = $formdata[2];
		}
	}
}
?>

<!DOCTYPE html>
<html lang = "ja">
<head>
<meta charset = "UTF-8" />
<title>編集用フォーム</title>
</head>
<body>
<h1>編集データの入力</h1>
<form action = "mission_2-6_edit_3.php" method = "post">
名前：<br />
<input type = "text" name = "name" size = "30" value = "<?php echo $name;?>" /><br />
コメント：<br />
<textarea name = "comment" cols = "30" rows = "5">
<?php echo $comment;?>
</textarea><br />
<input type = "hidden" name = "edit" value = "<?php echo $edit;?>" />
<br />
<input type = "submit" value = "編集" />
</form>
</body>
</html>
