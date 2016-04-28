<?php 
session_name("portal") ;
session_start();

if ($_REQUEST) {

	require_once("functions.php") ;

	// $action = $_GET['action'] ;
	$errors = array();
	$data = array();
	// Getting posted data and decodeing json
	$_POST = json_decode(file_get_contents('php://input'), true);
// 	print_r($_POST) ;
// die();
// exit() ;
		// checking for blank values.
		if (empty($_POST['email']))
		  $errors['email'] = 'Email is required.';

		if (empty($_POST['password']))
		  $errors['password'] = 'password is required.';

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else {

			$data = LoginClients($connection,$_POST['email'],$_POST['password'])  ;
			
			// print_r($response) ;	
			//  die();
			}
			// else{

			//   $data['message'] = 'Login was Unsuccessful';
			// }

		echo json_encode($data); 
		}
		// response back.

// 	}

	
// }
