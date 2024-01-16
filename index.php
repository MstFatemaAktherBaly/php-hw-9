<!-- today's learning skill CRUD
1.C = create
2.R = Read
3.U = Update
4.D = Delete -->

<?php
session_start();
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
    <div class="container">
        <div class="row">
        <div class="col-6 mx-auto bg-light bg-gradient p-5" style="margin-top: 40px;">

  <form action="store.php" method="post">

  <h2>Form Submission</h2>

  <div class="mb-3">
    <input value="<?= $_SESSION['olddata']['email'] ?? ''  ?>" name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">

   <?php
  if(isset($_SESSION ['errors']['email_error'])){?>
    <span class="text-danger">
    <?php
    echo $_SESSION ['errors']['email_error'];
    ?>
  </span>
    <?php
  }
   ?>
   
  </div>
  <div class="mb-3">
    <input value="<?= $_SESSION['olddata']['pass'] ?? ''  ?>" name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

    <?php
  if(isset($_SESSION ['errors']['pass_error'])){?>
    <span class="text-danger">
    <?php
    echo $_SESSION ['errors']['pass_error'];
    ?>
  </span>
    <?php
  }
   ?>

  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

  <span class="text-dark mt-3">
   <h2>
   <?= isset($_SESSION['msg']) ? $_SESSION['msg'] : '' ?>
   </h2>
  </span>

</form>
            </div>
        </div>
    </div>
</section>

<!-- form section end -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_unset();
?>