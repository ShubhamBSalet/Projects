<?php
session_start();

if (isset($_SESSION['OTP']) && isset($_POST['sub'])) {
    if ($_SESSION['OTP'] == $_POST['OTP']) {
        unset($_SESSION['OTP']);
        $_SESSION['student'] = true;
        header("Location: 4_Home.php");
        exit();
    } 
    else {
        echo '<div class="container alert alert-danger mt-3">Attempt becomes Fail...!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Check</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            max-width: 400px;
            margin-top: 50px;
        }
    </style>

</head>

<body>

    <div class="container">
        <h1 class="mb-4">OTP Verification</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input required class="form-control" type="number" id="otp" name="OTP">
            </div>
            <button type="submit" name="sub" class="btn btn-primary">Submit</button>
            <a class="btn btn-outline-primary mx-4" href="2_Sign_in.php" role="button">Sign In</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>