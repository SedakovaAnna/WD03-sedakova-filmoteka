<?php 

require('config.php');
require('functions/login-functions.php');

if ( isset($_POST['enter']) ) {
	$userName = 'service';
	$userPassword = '1234';

	if ( $_POST['login'] == $userName ) {
		if ( $_POST['password'] == $userPassword ) {
			$_SESSION['user'] = 'service'; //установка переменной сессии
			header('Location: ' . HOST . 'index.php');
		}
	}

}

include('views/header.tpl');
include('views/login.tpl');
include('views/footer.tpl');

?>