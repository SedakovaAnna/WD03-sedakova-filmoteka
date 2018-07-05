<?php 

require('config.php');
require('database.php');
$link = db_connect();

require('models/films.php');
require('functions/login-functions.php');

if ( array_key_exists('add-film', $_POST) ) {
	
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
		$result = film_new($link, $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['description']);
		if ($result) {
			$result_success = "Фильм добавлен.";
		} else {
			$result_error = "Ошибка, фильм не добавлен.";
		}
	}
}

include('views/header.tpl');
include('views/notifications.tpl');
include('views/new-film.tpl');
include('views/footer.tpl');

?>

