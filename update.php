<?php
// data collection
session_start();

include "./database/env.php";

$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];
$id = $_REQUEST['id'];
$errors = [];

// validation proccess

if(empty($email)){
$errors['email_error'] = "Enter your valid email";
}elseif (strtolower($email) != $email){
    $errors ['email_error'] =  "Use only lowercase.";
};


if(empty($pass)){
    $errors['pass_error'] = "Enter your password";
    }


// check errors

if(count ($errors) > 0){
//  redirection
  $_SESSION['errors'] = $errors;

  header("Location: edit.php?form_id=$id");

}else{
    $query = "UPDATE submission_forms SET email= '$email',password= '$pass' WHERE id = $id";
    $res = mysqli_query($conn, $query);

    if($res){
        header("Location: allform.php");
    }
}