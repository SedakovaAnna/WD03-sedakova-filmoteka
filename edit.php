<?php 
//соединение с БД
require('config.php'); // настройки подключения к БД
require('database.php'); // функция подключения к БД

$link = db_connect();// подключение к БД из database.php

require('models/films.php'); // функции для работы с БД
require('functions/login-functions.php'); // функция для входа на сайт 





// $result_success = "";
// $result_error = "";
$errors = array();






//удаление фильма из БД

if ( @$_GET['action'] == 'delete') {
$query = "DELETE FROM films WHERE id=' ". mysqli_real_escape_string($link, $_GET['id']) ." ' LIMIT 1";

mysqli_query($link, $query);

if (mysqli_affected_rows($link) > 0) {
		$result_info = "Фильм удален.";
	} else {
		$result_error = "Ошибка при удалении фильма.";
	}

}

//Сохранение фильмов в БД

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


if (array_key_exists('update-film', $_POST)) {

// Обработка ошибок
	if ( $_POST['title'] == '') {
		$errors[] = "Необходимо ввести название фильма!";
	}
	if ( $_POST['genre'] == '') {
		$errors[] = "Необходимо ввести жанр фильма!";
	}
	if ( $_POST['year'] == '') {
		$errors[] = "Необходимо ввести год фильма!";
	}

// Если ошибок нет
	if ( empty($errors) ) {

		$result = film_update($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_GET['id'], $_POST['description']);

	if ($result) {
		$result_success = "Информация о фильме изменена.";
	} else {
		$result_error = "Ошибка, при обновлении информации о фильме.";
	}
}

}

//Получем фильм из БД
$film = get_film($link, $_GET['id']);


include('views/header.tpl');
include('views/notifications.tpl');
include('views/edit-film.tpl');
include('views/footer.tpl');
?>


