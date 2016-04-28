<?php
session_name("portal") ;
session_start();

 $user =  $_SESSION['user'] ;
 $id =  $_SESSION['id'] ;

 $dept =  $_SESSION['dept'] ;
 $level =  $_SESSION['level'] ;
 $cos =  $_SESSION['cos'] ;
 // $level =  $_SESSION['level'] ;

 // $level =  $_SESSION['level'] ;

 $academic_session =  $_SESSION['academic_session'] ;
 $semester =  $_SESSION['semester'] ;

if ($_REQUEST) {

	require_once("functions.php") ;

	$action = $_GET['action'] ;
	$errors = array();
	$data = array();
	// Getting posted data and decodeing json
	$_POST = json_decode(file_get_contents('php://input'), true);

	if ($action == 'cReg') {
		
		// checking for blank values.
		if (empty($_POST))
		  $errors['empty'] = 'Seletect Course';

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else { 

			if (RegisterCoursesStudentArray($db,$_POST,$id,$user,$dept,$cos,$level,$academic_session,$semester,$datetime) == true) {					
			  $data['message'] = 'Course Registration was successful';
			}
			else{

			  $data['message'] = 'Signup was Unsuccessful';
			}

		}
		// response back.
		echo json_encode($data); 

	}

	
}