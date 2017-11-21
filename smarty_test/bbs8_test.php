<?php
session_start();

header('Expires:-1');
header('Cache-Control:');
header('Pragma:');

if(isset($_POST['name'], $_POST['comment'])){
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
	$comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);

	function createId($limit = 8){
		$daily = date('-d^/_Y_/^m-');
		$ipv4 = $_SERVER['REMOTE_ADDR'];
		$id = substr(base64_encode(sha1($daily.$ipv4)), 0, $limit);
		return $id;
	}

	if($name == ''){
		$name = '名無し';
	}

	if($comment == ''){
		$message = "コメント欄が未入力です。<br />";
	}

	else{
		$filename = '/home/ドメイン/public_html/smarty_test/bbs8_formdata_c3rW2pG8wv7qzRtb1_1.txt';

		if(file_exists($filename)){
			$lines    = file($filename);
			$lastLine = count($lines) + 1;
		}

		else{
			touch($filename);
			$lastLine = 1;
		}

		if(!@$_SESSION['time']){
			$_SESSION['time'] = 1;
		}

		if($_SESSION['time'] < time()){
			$comment = ereg_replace("\r\n", "<br />", $comment);
			$str = $lastLine.' : '.$name.' : '.$comment.' : '.date('Y/m/d H:i:s').' : '.createId($limit = 8)."\r\n";
			$fp  = fopen($filename, 'a');
			flock($fp, LOCK_EX);
			fwrite($fp, $str);
			flock($fp, LOCK_UN);
			fclose($fp);

			$message = "投稿完了しました。<br />";

			$time = time() + 60;
			$_SESSION['time'] = $time;
		}

		else{
			$message = "連続投稿できません。<br />";
		}

	}

}

$file = '/home/ドメイン/public_html/smarty_test/bbs8_formdata_c3rW2pG8wv7qzRtb1_1.txt';

if(file_exists($file)){
	$read = file($file);
}

require( dirname( __FILE__ ).'/libs/Smarty.class.php' );

$smarty = new Smarty();

$smarty->template_dir = dirname( __FILE__ ).'/templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/templates_c';

$smarty->assign('message', $message);
$smarty->assign('read', $read);

$smarty->display('bbs8.tpl');

?>