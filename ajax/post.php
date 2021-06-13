<?php
include('../config.php');
// $firstname = $_POST['firstname'];
// $lastname = $_POST['lastname'];
// $companytitle = $_POST['companytitle'];
// $companytype = $_POST['companytype'];
// $location = $_POST['location'];
// $mobilenumber = $_POST['mobilenumber'];
// $email = $_POST['email'];

// $password = $_POST['password'];

$fields ='';
foreach( $_POST as $stuff => $val ) {
    if( is_array( $stuff ) ) {
        foreach( $stuff as $thing) {
            echo $thing;
        }
    } else {
        if($stuff != 'g-recaptcha-response'){
            $fields .= $stuff . "='" . mysqli_real_escape_string($conn,$val) . "', ";
        }
        
    }
}

$buildsql = rtrim($fields, ', "');

         $q1 = "insert into userinfo set ".$buildsql." ";

         if(mysqli_query($conn,$q1)){
         echo 1;
         }
         else{
             echo 0;
         }

?>