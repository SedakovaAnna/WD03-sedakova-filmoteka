<?php 

//Получем фильмы из БД

function film_all($link){
	$query = "SELECT * FROM films";
	$films = array();
	$result = mysqli_query($link, $query);
	if ($result) {
		while ($row = mysqli_fetch_array($result)) {
			$films[] = $row;
		}
	}
	return $films;
}



// Создание нового фильма в БД
function film_new($link, $title, $genre, $year, $description=''){

		// Запись данных в БД
	$query = "INSERT INTO films (title, genre, year, description) VALUES (
	'". mysqli_real_escape_string($link, $title) ."',
	'". mysqli_real_escape_string($link, $genre) ."',
	'". mysqli_real_escape_string($link, $year) ."',
	'". mysqli_real_escape_string($link, $description) ."'
)";


if ( mysqli_query($link, $query) ) {
	$result = true;
} else {
	$result = false;
}

return $result;
}

// Поиск фильма в БД по id
function get_film($link, $id){
	$query = "SELECT * FROM films WHERE id = ' " . mysqli_real_escape_string($link, $id ) . "' LIMIT 1";
	$result = mysqli_query($link, $query);
	if ( $result = mysqli_query($link, $query) ) {
		$film = mysqli_fetch_array($result);
	}
	return $film;
}

// Изменение данных о фильме в БД
function film_update($link, $title, $genre, $year, $id, $description){
	if ( isset($_FILES['photo']['name']) && $_FILES['photo']['tmp_name'] != ""  ) {
		$fileName = $_FILES['photo']['name'];
		$fileTmpLoc = $_FILES['photo']['tmp_name'];
		$fileType = $_FILES['photo']['type'];
		$fileSize = $_FILES['photo']['size'];
		//$fileExt - расширение файла
		$kaboom = explode(".", $fileName);//разбиение строки на 2 элемента с разделителем "."
		$fileExt = end($kaboom); //запись последнего элемента
		
		//проверка ширины и высоты файла
		list($width, $height) = getimagesize($fileTmpLoc);//list- создает переменные, getimagesize - возвращает размеры картинки
		if ($width < 10 || $height < 10) {
			$errors[] = 'Картинка не имеет размеров'; 
		}

		//Переименование файла
		$db_file_name = rand(100000000,999999999)  . "." . $fileExt;

		//Проверка на ошибки
		if($fileSize > 10485760) {
			$errors[] = 'Your image file was larger than 10mb';
		} else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $fileName) ) {
			$errors[] = 'Your image file was not jpg, jpeg, gif or png type';
		} else if ($fileErrorMsg == 1) {
			$errors[] = 'An unknown error occurred';
		}

		$photoFolderLocation = ROOT . 'data/films/full/';//путь к большой картинке
		$photoFolderLocationMin = ROOT . 'data/films/min/';//путь к миниатюре

		$uploadfile = $photoFolderLocation . $db_file_name; //полное имя файла
		$moveResult = move_uploaded_file($fileTmpLoc, $uploadfile);//перемещение файла из временного хранилища и переименовываем его

		if ($moveResult != true) {
			$errors[] = 'File upload failed';
		}

		require_once(ROOT . "/functions/image_resize_imagick.php");
		$target_file =  $photoFolderLocation . $db_file_name;
		$resized_file = $photoFolderLocationMin . $db_file_name;
		$wmax = 137;//макс ширина
		$hmax = 200;//макс высота
		$img = createThumbnail($target_file, $wmax, $hmax); //обрезка
		$img->writeImage($resized_file);//запись файла
	}

	$query = "	UPDATE films 
	SET title = '". mysqli_real_escape_string($link, $title) ."', 
	genre = '". mysqli_real_escape_string($link, $genre) ."', 
	year = '". mysqli_real_escape_string($link, $year) ."',
	description = '". mysqli_real_escape_string($link, $description) ."',
	photo = '". mysqli_real_escape_string($link, $db_file_name) ."'  
	WHERE id = ".mysqli_real_escape_string($link, $id)." LIMIT 1";

	if ( mysqli_query($link, $query) ) {
		$result = true;
	} else { 
		$result = false;
	}
	
	return $result;
}

//Удаление фильма по id из БД
function film_delete($link, $id) {
	$query = "DELETE FROM films WHERE id = ' " . mysqli_real_escape_string($link, $id ) . "' LIMIT 1";
	mysqli_query($link, $query);

	if ( mysqli_affected_rows($link) > 0 ) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}


?>