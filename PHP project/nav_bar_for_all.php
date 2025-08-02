<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Header</title>
  </head>
  <body>

<?php
session_start();

if(isset($_SESSION['student']))
{
    $login = true;
}
else
{
    $login = false;
}

if ($login) 
{    
echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="javascript:void(0)">
        <img src="img_avatar1.jpg" alt="chintan" style="width:40px;" class="rounded-circle logo">
    </a>

    <a class="navbar-brand" href="">ID Card Generator</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link" href="4_Home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="5_ID_card_gen.php">generate id card</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="5_2_1_insert_data.php">insert data</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="6_About.php">About</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-3">
            <li class="nav-item ">
                <a class=" btn btn-primary" href="99_logout.php">Log out</a>
            </li>
        </ul>
        </div>
    </nav>';
}
if (!$login) 
{
    echo'<div class="jumbotron my-5 mx-5">
            <center><h1 class="display-4">Error...!</h1>
            <p class="lead">Sorry, You are not Sign In.</p>
            <hr class="my-4">
            <p>Click here to Sign In</p>
            <a class="btn btn-outline-danger btn-lg" href="2_Sign_in.php" role="button">Sign In</a></center>
        </div>';
}
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>