<?php 

require('config.php');

if ( isset($_POST['user-submit']) ){
	$userName = $_POST['user-name'];//значение куки user-name
	$userCity = $_POST['user-city'];//значение куки user-city
	$exrire =  time() + 60*60*24*30;//время жизни куки 1 месяц
	
	setcookie('user-name', $userName, $exrire);//установка куки - имя пользователя
	setcookie('user-city', $userCity, $exrire);//установка куки - город пользователя
}

header('Location: ' . HOST . 'request.php');//перенаправление

?>