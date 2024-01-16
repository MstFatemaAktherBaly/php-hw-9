<?php
session_start();

include "./database/env.php";

$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];

$errors = [];



if (empty($email)){
  $errors ['email_error']= "Enter your valid email";
}elseif (strtolower($email) != $email){
    $errors ['email_error']=  "Use only lowercase.";
};

if(empty($pass)){
    $errors ['pass_error']=  "Enter your password.";
}

if (count($errors) > 0 ){

    $_SESSION ['olddata'] = $_REQUEST;
    $_SESSION ['errors'] = $errors;

    // redirection

    header("Location: index.php");
} else{
   $query = "INSERT INTO submission_forms(email, password) VALUES ('$email','$pass')";
   $res = mysqli_query($conn,$query);
   
   if($res){

    $_SESSION['msg'] = 'Your information has been submitted';
    header("Location: index.php");
   }
}

?>