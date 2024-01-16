<?php
session_start();

include("./database/env.php");

$id = $_REQUEST['id'];
$query = "SELECT * FROM submission_forms WHERE id = $id";
$res = mysqli_query($conn,$query);
$form = mysqli_fetch_assoc($res);

if($form){

}else{
  header("Location: error404.php");
}

// echo "<pre>";
// print_r(($form));
// echo "</pre>";
// exit();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-Form CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- nav section start -->

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container" style="margin-right: 20px;">
            <a class="navbar-brand" href="index.html">Form Submission</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars hamburger"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto mb-2 mb-lg-3">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark">Submit Form</a>
                    </li>
                    <li class="nav-item">
                        <a href="allform.php" class="nav-link text-dark">All Form</a>
                    </li>
                   
                </ul>
            </div>
        </div>
    </nav>

<!-- nav section end -->
    
<!-- form section start -->

<section>
    
        <div class="card col-lg-8 mx-auto bg-light bg-gradient p-5" style="margin-top: 40px;">
       <div class="card-header"><?= $form['email']?></div>
      
       <div class="card-footer">
       <img style="width: 40px; height: 40px; border-radius: 50%; object-fit:cover" src="https://api.dicebear.com/7.x/initials/svg?seed=<?= $form['password'] ?>"><?= $form['password']?></div>
            </div>
</section>

<!-- form section end -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_unset();
?>