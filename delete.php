<?php
include "./database/env.php";
$id = $_REQUEST['id'];
$query = "DELETE FROM submission_forms WHERE id = $id";
$res = mysqli_query($conn,$query);

if($res){
    $_SESSION['msg']= "Your data has been deleted";
    header("Location: ./allform.php");
}

?>