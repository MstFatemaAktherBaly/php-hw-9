<?php
session_start();

include "./database/env.php";
$query = "SELECT * FROM submission_forms";
$res = mysqli_query($conn,$query);
$forms = mysqli_fetch_all($res,1);



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

         <table class="card table">
          <tr>
            <th>#</th>
            <th>Email</th>
            <th>Password</th>
            <th>All form</th>
          </tr>


          <?php
    if(count($forms) > 0){

          foreach($forms as $key=>$form){?>
            <tr>
            <td><?= ++$key ?></td>
            <td><?= $form['email'] ?></td>
            <td>
                <img style="width: 40px; height: 40px; border-radius: 50%; object-fit:cover " src="https://api.dicebear.com/7.x/initials/svg?seed=<?= $form['password'] ?>">
                <?= strlen($form['password']) > 5 ? substr($form['password'] , 0 , 4) . '.....' : $form['password']?>
                </td>

                <td>
                    <div class="btn-group">
                        <a class="btn btn-sm btn-warning" href="./showform.php?id=<?= $form['id']?>">Show</a>
                        <a class="btn btn-sm btn-primary" href="./edit.php?form_id=<?= $form ['id']?>">Edit</a>
                        <a class="btn btn-sm btn-danger" href="./delete.php?id=<?= $form['id']?>">Delete</a>
                    </div>
                </td>

          </tr>
          <?php
          }
        } else{?>
            <tr>
            <td colspan="4" class="text-center"><h5>No Data Found😢</h5></td>
          </tr>
          <?php
        }
          ?>
             
        
         </table>

            </div>
</section>

<!-- form section end -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_unset();
?>