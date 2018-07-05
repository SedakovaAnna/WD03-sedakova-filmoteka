<?php 

require('config.php'); // настройки подключения к БД
require('database.php'); // функция подключения к БД

$link = db_connect();// подключение к БД из database.php

require('models/films.php'); // функции для работы с БД

// Удаление фильма
if ( @$_GET['action'] == 'delete') {

	$reslut = film_delete($link, $_GET['id']);

	if ( $reslut ) {
		$result_info = "Фильм удален.";
	} else {
		$result_error = "Ошибка при удалении фильма.";
	}
}

$film = get_film($link, $_GET['id']);

// echo "<pre>";
// print_r($film);
// echo "</pre>";

include('views/header.tpl');
include('views/notifications.tpl');
include('views/film-single.tpl');
include('views/footer.tpl');

?>