<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Header</title>
</head>

<style type="text/css">
  hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border: 1px solid white;
  }
</style>
</head>

<body>
  <?php
  session_start();

  if (isset($_SESSION['faculty'])) {
    $login = true;
  } else {
    $login = false;
  }

  ?>

  <?php
  if ($login) {
    echo '
  <nav class="navbar navbar-expand-lg bg-dark-body-tertiary navbar-dark ">
  <div class="container-fluid ">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
  
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
    <li class="nav-item mx-3 ">
      <a class="nav-link active" aria-current="page" href="faculty_home.php">Home</a>
    </li>

    <li class="nav-item mx-3">
      <a class="nav-link active" aria-current="page" href="faculty_add_student.php">Add Student</a>
    </li>

    <li class="nav-item mx-3">
    <a class="nav-link active" aria-current="page" href="faculty_delete_student.php">Delete Student</a>
    </li>

    <li class="nav-item mx-3">
    <a class="nav-link active" aria-current="page" href="faculty_update_student.php">Update Student</a>
    </li>

    <li class="nav-item mx-3">
    <a class="nav-link active" aria-current="page" href="faculty_select_student.php">See Student</a>
    </li>
  
    <a href="99_logout.php" class="btn btn-outline-light">Log Out</a>
  
  </ul>
    </div>
  
  </div>
</nav>
<hr>';
  }

  if (!$login) {
    echo '<div class="jumbotron my-5 mx-5">
            <center><h1 class="display-4">Error...!</h1>
            <p class="lead">Sorry, You are not Sign In.</p>
            <hr class="my-4">
            <p>Click here to Sign In</p>
            <a class="btn btn-outline-danger btn-lg" href="faculty_login.php" role="button">Sign In</a></center>
        </div>';
  }
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>