<?php 
session_name("portal") ;
session_start();
if ($_GET) {
 $id =  $_SESSION['id'] ;

 $fname =  $_SESSION['fname'] ;
 $lname =  $_SESSION['lname'] ;
 $email =  $_SESSION['email'] ;

    header('Content-Type: application/json');

	require_once("functions.php") ;
	if ($_GET['obj'] == "clirec") {
		// $id = $_GET['id'] ;
		return	GetClientRec($db,$id) ;
	}
	elseif ($_GET['obj'] == "courses") {	

		echo	GetCoursesLevel101($connection,$dept,$level) ;
	}
}
