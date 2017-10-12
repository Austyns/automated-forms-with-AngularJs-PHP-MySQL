<?php 
require_once 'dbHelper.php';
$db = new dbHelper();

  $datetime = date('Y-m-d H:i:s'); 

  $date = date('Y-m-d'); 

  $base_server = "http://localhost/nipc-clients" ;

  // db connection
      $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
        try {
            $connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            $response["status"] = "error";
            $response["message"] = 'Connection failed: ' . $e->getMessage();
            $response["data"] = null;
            exit;
        }




// Function to creat Slug field

function CreateUnderscoreSlug($string) {

    $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '_'
    );

    // -- Remove duplicated spaces
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

    // -- Returns the slug field 
    return strtolower(strtr($string, $table));


}



//  function to login Students 
  function Login($connection,$email,$password){

    $data =  array();
    $password =  encrypt( $password ) ;
    
  
  $sql = "SELECT * FROM clients WHERE cli_email = ? AND cli_status = 'active' ";
  
  $query = $connection ->prepare($sql) ;

  $query->execute(array("$email"));

  $num =  $query->rowCount();
  
  if($num >0) {
  $result = $query->setFetchMode(PDO::FETCH_ASSOC);
    

// echo $_SESSION['email'];
    while ($row = $query->fetch() ) {
     
      $fname = $row['cli_fname'] ;
      $lname = $row['cli_lname'] ;
      $db_pass = $row['cli_pass'] ;
      $db_email = $row['cli_email'];
      $country = $row['cli_country'];
      $address = $row['cli_address'];
      $phone = $row['cli_phone'];
      $id = $row['cli_id'];

      $name = $fname ." ".$lname ;

  
      // $dpt = $row['name'] ;

    
    if($db_email==$email){
      if($db_pass==$password){
  
      $_SESSION['fname'] = $fname;
      $_SESSION['lname'] = $lname;
      $_SESSION['email'] = $email;
      $_SESSION['phone'] = $phone;
      $_SESSION['country'] = GetCountryId($connection,$country);
      $_SESSION['id'] = $id;
      $_SESSION['address'] = $address;
      $_SESSION['name'] = $name ;
      
        
      // $_SESSION['department'] = $dpt;
  
      
          $expire = time()+60*60*60;

      setcookie('nipc-clients', $_SESSION['name'], $expire);

      $data['msg'] = "Login Successful" ;
      $data['status'] = "true" ;
      $data['erre'] = '' ;
        // echo "Login Successful";
      
      
      }else{  
      $data['msg'] = "Unsuccessful" ;
      $data['status'] = "false" ;
      $data['erre'] = 'Your password is incorrect!' ;
        // echo "Your password is incorrect!";
        
      }
    
    }else{  
      $data['msg'] = "Unsuccessful" ;
      $data['status'] = "false" ;
      $data['erre'] = 'Your Email is incorrect!' ;
      // echo "Your Email is incorrect!";
      
    }
  }
  }else{  
      $data['msg'] = "Unsuccessful" ;
      $data['status'] = "false" ;
      $data['erre'] = 'This Email is not registered!' ;
    
    // echo "This Email is not registered!";
      
  } 

  return $data ; 
}



// function to register a form

function InsertForm($db,$fm_title,$fm_discrip,$datetime){ 

        $rows = $db->insert("forms",array('fm_title' => "$fm_title",'fm_discrip' => "$fm_discrip",'registered_at' => "$datetime" ), array('fm_title') );

           if ($rows['status'] == "success") {
             return true ;
           }
              else{
             return false ;
          }
}



// function to Update a form


function UpdateForm($db,$fm_id,$fm_title,$fm_discrip,$datetime){ 

        $rows = $db->insert("forms",array('fm_title' => "$fm_title",'fm_discrip' => "$fm_discrip",'registered_at' => "$datetime" ), array('fm_id' => "$fm_id") , array('fm_title') );

           if ($rows['status'] == "success") {
             return true ;
           }
              else{
             return false ;
          }
}


// Function to get Forms 

function GetForms($db){
    $row = $db->select("forms", array() );
    print_r(json_encode($row));
}



// Function to get Agencies Forms 

function GetAgencyForms($db,$id){
    $row = $db->select("forms", array('fm_agency' => "$id") );
    print_r(json_encode($row));
    // looop through Forms and for each form
    // check if form have been submited by Client
}




// Function to get Form Details 

function GetFormDetails($db,$id){
    $row = $db->select("forms", array('fm_id' => "$id") );
    print_r(json_encode($row));
}



// Function to get Form Details 

function GetFormParams($db,$id){
    $row = $db->select("form_fields  LEFT JOIN form_field_type ON form_fields.fd_type = form_field_type.typ_id  ", array('fd_form' => "$id") );
    print_r(json_encode($row));
}

// Function to get FormName From Id 
function GetFormNameId($db,$id){
  $row = $db->select("forms", array('fm_id' => "$id")) ;
  if ($row['status'] == 'success') {
      $name = $row['data'][0]['fm_title'] ;
  }
  return $name ;
}

//  function to Gget form fields names as Arry for Processing 

function GetFieldsArray($db,$id){
   $row = $db->select("form_fields ", array('fd_form' => "$id") );
    if ($row['status'] == 'success') {
          $fields  = $row['data']; 
          
          $a =  "" ;
          foreach ($fields as $key) {

          $fd_id  = $key['fd_id']; 

            if ($a != "") { $a .= ","; }
            // if ($key['fd_type'] == 1) { $a .= " "; }
               $a .= "$fd_id" ; 
              }
            // $a .= "" ;


          }
           // return $a ;
    return explode(",",$a);

}


// Function to get Form Details 

function GetFormFieldsView($db,$id){
    $row = $db->select("form_fields  LEFT JOIN form_field_type ON form_fields.fd_type = form_field_type.typ_id  ", array('fd_form' => "$id") );

    // if ($row['status'] == 'success') {
    if ($row) {
          $fields  = $row['data']; 
          // print_r(($fields)) ;
          // exit() ;
          // die();
          $a =  '[' ;
          foreach ($fields as $key) {
          $fd_id  = $key['fd_id']; 
          $fd_title  = $key['fd_title']; 
          $fd_name  = $key['fd_name']; 
          $fd_type  = $key['fd_type']; 
          $fd_discrip  = $key['fd_discrip']; 
          $fd_form  = $key['fd_form']; 
          $form_name = GetFormNameId($db,$fd_form) ;
          $typ_name  = $key['typ_name']; 

            if ($a != "[") { $a .= " , "; }
            // $fid = CheckAndCreateField($fd_type,$fd_name,$fd_discrip) ;
            $sel = CheckIfSelectField($fd_type,$fd_id) ;
            // if ($key['fd_type'] == 1) { $a .= " "; }
               $a .= '{"fd_title" : "'.$fd_title.'" , "form_name" : "'.$form_name.'" , "fd_form" : "'.$fd_form.'"  , "fd_name" : "'.$fd_name.'"  , "fd_discrip" : "'.$fd_discrip.'"  , "fd_id" : "'.$fd_id.'"  , "typ_name" : "'.$typ_name.'"  ,  "sel" : "'.$sel.'"   } ' ; 
              }
            $a .= " ]" ;

          }
           print_r(($a));

    }


// Function to check input type and create field 

function CheckAndCreateField($id,$name,$discrip){
  if ($id == 1) {
    $a = '<input type=\"text\" class=\"form-control\" placeholder=\"'.$discrip.'\"  name=\"'.$name.'\" autocomplete=\"off\" />' ;    
  }elseif ($id == 2) {
    $a = '<input type=\"email\" class=\"form-control\" placeholder=\"'.$discrip.'\" name=\"'.$name.'\" autocomplete=\"off\" />' ;
  }elseif ($id == 3) {
    $a = '<input type=\"password\" class=\"form-control\" placeholder=\"'.$discrip.'\" name=\"'.$name.'\"  />' ;
  }elseif ($id == 4) {
    $a = '<select class=\"form-control\" name=\"'.$name.'\">
            <option>-- Select --</option>
            <option value=\"\"> Name</option>
          </select>' ;
  }
  return $a ;
}



// Function to check input type If select 

function CheckIfSelectField($id,$fd_id){
  if ($id == 4) {
    $a = '<a href=\"\" class=\"btn btn-primary btn-sm\"> Add Options </a>' ;    
  }else {
    $a = '' ;
  }
  return $a ;
}





// Function to get Input types 

function  GetInputTypes($db){
    $row = $db->select("form_field_type", array() );
    print_r(json_encode($row));
}





// function to register a Form Field

function InsertFormFields($db,$fd_title,$fd_form,$fd_type,$fd_discrip,$datetime){ 
  
        $fd_name =  CreateUnderscoreSlug($fd_title) ;

        $rows = $db->insert("form_fields",array('fd_title' => "$fd_title",'fd_name' => "$fd_name",'fd_form' => "$fd_form",'fd_type' => "$fd_type",'fd_discrip' => "$fd_discrip",'registered_at' => "$datetime" ), array('fd_title', 'fd_form') );

           if ($rows['status'] == "success") {
             return true ;
           }
              else{
             return false ;
          }
}

// Function to Submit Forms 

function SubmitForm($db,$form,$field,$value,$datetime){

     $rows = $db->insert("submited_forms",array('sf_form' => "$form",'sf_form_field' => "$field",'sf_value' => "$value",'registered_at' => "$datetime" ), array('sf_form') );

           if ($rows['status'] == "success") {
             return true ;
           }
              else{
             return false ;
          }
}



// Function to get Submited Form  

function GetSubmitedForms($db){
    $row = $db->selectAndOrder("submited_forms LEFT JOIN forms ON submited_forms.sf_form = forms.fm_id ", "sf_form, fm_title", array(), "group by sf_form" );
    // print_r(json_encode($row)) ;
    // exit();
    // die();

    // if ($row['status'] == 'success') {
    if ($row) {
      $fields  = $row['data']; 
      // print_r(json_encode($fields)) ;
      // exit() ;
      // die();
      $a =  '[' ;
      foreach ($fields as $key) {
      $sf_form  = $key['sf_form'];  
      $fm_title  = $key['fm_title'];

        if ($a != "[") { $a .= " , "; }
        // $fid = CheckAndCreateField($fd_type,$fd_name,$fd_discrip) ;
        $details = GetEachSubmitedFormsParams($db,$sf_form) ;
        // if ($key['fd_type'] == 1) { $a .= " "; }
           $a .= '{"sf_form" : "'.$sf_form.'" ,"fm_title" : "'.$fm_title.'" , "details" : '.$details.' } ' ; 
          }
        $a .= " ]" ;

      }
       print_r(($a));
}

// Function to get Submited Form Details 

function GetEachSubmitedFormsParams($db,$sf_form){
    $row = $db->select("submited_forms LEFT JOIN form_fields ON submited_forms.sf_form_field = form_fields.fd_id LEFT JOIN form_field_type ON form_fields.fd_type = form_field_type.typ_id", array('sf_form' => "$sf_form") );
   return (json_encode($row['data']));
}






