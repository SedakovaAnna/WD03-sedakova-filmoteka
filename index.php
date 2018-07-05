<?php 

require('config.php'); // настройки подключения к БД
require('database.php'); // функция подключения к БД

$link = db_connect();// подключение к БД из database.php

require('models/films.php'); // функции для работы с БД

require('functions/login-functions.php'); // функция для входа на сайт 

// Удаление фильма
if ( @$_GET['action'] == 'delete') {

	$reslut = film_delete($link, $_GET['id']);

	if ( $reslut ) {
		$result_info = "Фильм удален.";
	} else {
		$result_error = "Ошибка при удалении фильма.";
	}
}

$films = film_all($link); //получаем все фильмы из БД, models->films.php 

include('views/header.tpl'); //подключение шаблона начала страницы header.tpl
include('views/notifications.tpl'); //подключение шаблона уведомлений notifications.tpl
include('views/index.tpl'); //подключение шаблона середины страницы index.tpl
include('views/footer.tpl'); //подключение шаблона конца страницы footer.tpl

?>


