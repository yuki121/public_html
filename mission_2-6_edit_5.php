<?php
if(isset($_POST['edit'],$_POST['name'],$_POST['comment'],$_POST['password'])){
	$edit = $_POST['edit'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];
	$password = $_POST['password'];
	$filename = 'mission_2-6_formdata.txt';
	$readfile = file($filename);
	$fp  = fopen($filename,'w');

	for($i = 0; $i < count($readfile); $i++){
		$formdata = explode("<>",$readfile[$i]);
		flock($fp, LOCK_EX);

		if($formdata[0] != $edit){
			fwrite($fp, $readfile[$i]);
		}

		else{
			if($formdata[3] != $password){
				fwrite($fp, $readfile[$i]);
				echo "パスワードが間違っています。";
			}

			else{
				$str = $edit.'<>'.$name.'<>'.$comment.'<>'.$formdata[3].'<>'.$formdata[4];
				fwrite($fp, $str);
				echo "編集完了しました。";
			}
		}
	}

	flock($fp, LOCK_UN);
	fclose($fp);

}
?>
