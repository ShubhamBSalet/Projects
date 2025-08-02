<!DOCTYPE html>
<html>

<head>
    <title>ID Card Generator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Home</title>
    <style>
        .logo {
            max-width: 300px;
            animation: rotate 4s infinite linear;
        }
        .hero {
            background: linear-gradient(to right, #0d6efd, #00bfff);
            color: white;
            padding: 60px 30px;
            border-radius: 20px;
            text-align: center;
        }

        .card:hover {
            transform: scale(1.03);
            transition: 0.3s;
        }

        .btn-logout {
            position: absolute;
            top: 15px;
            right: 20px;
        }
    </style>
</head>

<body>

    <?php
    include "nav_bar_for_all.php";
echo`
    <!-- Rest of your website content goes here -->
    <div class="container mt-5">
  <div class="row justify-content-center text-center">
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card shadow p-4" style="min-height: 300px;">
        <h4 class="card-title mb-3">Submit ID Details</h4>
        <p class="card-text fs-5">Fill your academic and personal info for ID card generation.</p>
        <a href="id_request_form.php" class="btn btn-primary btn-lg mt-3">Submit Now</a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card shadow p-4" style="min-height: 300px;">
        <h4 class="card-title mb-3">View ID Status</h4>
        <p class="card-text fs-5">Check whether your ID card request is approved or pending.</p>
        <a href="id_status.php" class="btn btn-primary btn-lg mt-3">View Status</a>
      </div>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <div class="card shadow p-4" style="min-height: 300px;">
        <h4 class="card-title mb-3">Download ID Card</h4>
        <p class="card-text fs-5">Download your digital ID once it's approved by faculty.</p>
        <a href="id_download.php" class="btn btn-primary btn-lg mt-3">Download</a>
      </div>
    </div>
  </div>
</div>`
    ?>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>