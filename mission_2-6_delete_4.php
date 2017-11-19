<?php
if(isset($_POST['delete'],$_POST['password'])){
	$delete = $_POST['delete'];
	$password = $_POST['password'];
	$filename = 'mission_2-6_formdata.txt';
	$readfile = file($filename);
	$fp  = fopen($filename,'w');

	for($i = 0; $i < count($readfile); $i++){
		$formdata = explode("<>",$readfile[$i]);
		flock($fp, LOCK_EX);

		if($formdata[0] != $delete){
			fwrite($fp, $readfile[$i]);
		}

		else{
			if($formdata[3] != $password){
				fwrite($fp, $readfile[$i]);
				echo "パスワードが間違っています。";
			}

			else{
				$str = $delete.'<>'."削除しました。".'<>'."削除しました。".'<>'.$formdata[3].'<>'.$formdata[4];
				fwrite($fp, $str);
				echo "削除完了しました。";
			}
		}
	}

	flock($fp, LOCK_UN);
	fclose($fp);

}
?>
