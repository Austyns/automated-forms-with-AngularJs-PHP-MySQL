<?php 
// session_name("portal") ;
session_start();
if ($_GET) {

 // $id =  $_SESSION['user'] ;
 // $dept =  $_SESSION['dept'] ;
 // $level =  $_SESSION['level'] ;

    header('Content-Type: application/json');

	require_once("functions.php") ;

	$obj = $_GET['obj'] ;

	if ($obj == "forms") {
		return	GetForms($db) ;
	}
	elseif ($obj == "setForm") {
		$id = $_GET['fid'] ;
		return	GetFormDetails($db,$id) ;
	}
	elseif ($obj == "FormParams") {
		$id = $_GET['fid'] ;
		return	GetFormParams($db,$id) ;
	}
	elseif ($obj == "inputyp") {
		return	GetInputTypes($db) ;
	}
	elseif ($obj == "FormView") {
		$id = $_GET['fid'] ;
		return	GetFormFieldsView($db,$id) ;
	}
	elseif ($obj == "clirec") {
		$id = $_GET['id'] ;
		return	GetClientDetails($db,$id) ;
	}
	elseif ($obj == "AgForms") {
		$id = $_GET['aid'] ;
		return	GetAgencyForms($db,$id) ;
	}
	elseif ($obj == "SubForms") {
		
		return	GetSubmitedForms($db) ;
	}
}
