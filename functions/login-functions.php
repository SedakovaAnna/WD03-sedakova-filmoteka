<?php 

function isAdmin(){

	if ( isset($_SESSION['user']) ) {
		if ( $_SESSION['user'] == 'service' ) { 
			$result = true;
		} else {
			$result = false;
		}
	} else {
		$result = false;
	}

	return $result;
}
?>