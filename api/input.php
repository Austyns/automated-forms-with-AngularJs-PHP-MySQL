<?php
if ($_POST) {

	require_once("functions.php") ;

	$action = $_GET['action'] ;
	$errors = array();
	$data = array();
	// Getting posted data and decodeing json
	$_POST = json_decode(file_get_contents('php://input'), true);

	if ($action == 'Nform' ) {

		// checking for blank values.
		if (empty($_POST['fm_title']))
		  $errors['fm_title'] = 'Form title is required.';

		if (empty($_POST['fm_discrip']))
		  $errors['fm_discrip'] = 'Discription is required';

		// if no errors 

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else {
		  // $data['message'] = 'Form data is going well';
	
		    $fm_title = $_POST['fm_title'];
		    $fm_discrip = $_POST['fm_discrip'];
		     
		    if (InsertForm($db,$fm_title,$fm_discrip,$datetime) == true) {
		     
					  $data['message'] = "Application  was successful" ;
		     }
		     else{
					  $data['message'] = 'Application was Unsuccessful';
		     }

		}
		// response back.
		echo json_encode($data); 
	}elseif ($action == 'SetupForm' ) {
		
		// checking for blank values.
		if (empty($_POST['fd_title']))
		  $errors['fd_title'] = 'Form title is required.';

		if (empty($_POST['fd_type']))
		  $errors['fd_type'] = 'Input type is required';

		// if no errors 

		if (!empty($errors)) {
		  $data['errors']  = $errors;
		} else {
		  // $data['message'] = 'Form data is going well';
	
        $fd_title = $_POST['fd_title'] ;
        $fd_form = $_GET['fid'] ;
        $fd_type = $_POST['fd_type'] ;
        $fd_discrip = $_POST['fd_discrip'] ;
	

		if (InsertFormFields($db,$fd_title,$fd_form,$fd_type,$fd_discrip,$datetime) == true) {
					  $data['message'] = "Application  was successful" ;
		     }
		     else{
					  $data['message'] = 'Application was Unsuccessful';
		     }

		}
		// response back.
		echo json_encode($data); 
	}

	elseif ($action == 'fms' ) {
		$fid = $_GET['fid'] ;
		// $cid = $_GET['cid'] ;

			$column_names = GetFieldsArray($db,$fid)  ;

			$post_params = $_POST['params'] ;
			$aVal = array_values($_POST['params']) ;
			$keys = array_keys($_POST['params']);
			$columns = '';
			$values = '';

			foreach($column_names as $desired_key){ 

			   if(!in_array($desired_key, $keys)) {
			   		$$desired_key = '' ;
				}else{
					$$desired_key = $post_params[$desired_key];
				}


			    if ($columns != "") { $columns .= ","; }
			     $columns .= $desired_key; 

					        
			    if ($values != "") { $values .= ","; }
			     $values .= $$desired_key; 
         
			}
			$columns = explode(",",$columns) ;
			$values = explode(",",$values) ;

			if(!empty($_POST)){
				// Insert query (Insert Into Submited Forms )

				foreach($columns as $index => $cols) {

				 	// echo "$cols - " . $values[$index] ."<br>" ;

				 	SubmitForm($db,$fid,$cols,$values[$index],$datetime) ;
				}
				  $data['message'] = "Form was successfully Submited" ;
				  $data['status'] = "success" ;
			

			}else{
				// $this->response('',204);	
				//"No Content" status
			  $errors['all'] = 'Plese fill out the required Fields ';
			  $data['errors']  = $errors;
		}
		// response back.
		echo json_encode($data); 

	}
	
}


