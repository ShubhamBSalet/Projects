<?php
include "nav_bar_for_all.php";

if (isset($_SESSION['student'])) {
    $login = true;
} else {
    $login = false;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            text-align: center;
        }

        .card-generator {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: fade-in 1s;
        }

        @keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .card-generator h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-generator p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>
</head>

<body>

    <?php

    if ($login) {

        echo '<div class="container mt-5">
        <div class="card-generator">
            <h1 class="text-center mb-4">generate id card</h1>
            <form action="5.1_convert_to_pdf.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="en">Enrollment:</label>
                    <input type="text" pattern="[0-9]+" class="form-control" id="en" name="en" placeholder="Enter your Enrollment">
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <button type="submit" anem="submit" class="btn btn-primary">Generate ID Card</button>
            </form>
        </div>
    </div>
</body>
</html>';

    }
    ?>