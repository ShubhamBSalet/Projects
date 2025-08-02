<!DOCTYPE html>
<html>

<head>
    <title>Index</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <head>
        <title>Delete student</title>
    </head>

    <?php

    include "faculty_nav_student.php";

    if (isset($_SESSION['faculty'])) {
        $login = true;
    } else {
        $login = false;
    }

    if ($login) {

        echo '<style type="text/css">
label{
    color: white;
}

body {
    margin: auto; 
    font-family: -apple-system,BlinkMacSystemFont, sans-serif;
    overflow: auto; 
    background: linear-gradient(315deg,rgba(101,0,94,1) 3%, rgba(60,132,206,1) 38%,rgba(48,238,226,1) 68%, rgba(255,25,25,1) 98%); 
    animation: gradient 15s ease infinite; 
    background-size: 400% 400%; 
    background-attachment: fixed;
}

@keyframes gradient {
    0% {
        background-position: 0% 0%;
    }

    50% {
        background-position: 100% 100%;
    }
    100% {
        background-position: 0% 0%;
    }

}
.wave {
    background: rgb(255 255 255 / 25%);
    border-radius: 1000% 1000% 0 0;
    position: fixed;
    width: 200%;
    height: 12em;
    animation: wave 10s -3s linear infinite;
    transform: translate3d(0, 0, 0); opacity: 0.8;
    bottom: 0;
    left: 0;
    z-index: -1;
}

.wave:nth-of-type(2) {
    bottom: -1.25em;
    animation: wave 18s linear reverse infinite;
    opacity: 0.8;
}

.wave:nth-of-type(3) {
    bottom: -2.5em;
    animation: wave 20s -1s reverse infinite; opacity: 0.9;
}

@keyframes wave {

    2% {
        transform: translateX(1%);
    }

    25% {
        transform: translateX(-25%);
    }

    50% {
        transform: translateX(-50%);
    }

    75% {
        transform: translateX(-25%);
    }

    100% {
        transform: translateX(1);
    }

}
.container{
    text-align: center; 
    font-size: 30px; 
    color: darkcyan; 
    border: 5px solid white; 
    border-radius: 15px;
    animation: fade-in 1s;  
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

@keyframes fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

    </style>

<body> 
<div>

<div class="wave"></div>

<div class="wave"></div>

<div class="wave"></div>

</div> 
<div class="container my-5">
    <form method="post" action="faculty_delete_student.php">
      
      <br><label for="email">Enrollment :</label>
        <input type="number" class="form-control" id="email" name="enrollment" placeholder="Enter Enrollment..." required><br>

      <div class="form-group">
        <label for="email">Email ID:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email ID" required>
      </div>

        <button type="submit" class="btn btn-outline-light mx-3 my-5">Delete</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>';
    }
    ?>

    <?php

    include "_dbconnect.php";
    if (!$conn) {
        die("Error : " . mysqli_connect_error());
    } else {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $email = $_POST['email'];

            $sql = "DELETE FROM `sign_up` WHERE `email` = '$email'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<h1 style='text-align:center;font-size:40px;color:white;background-image:linear-gradient(to right,purple,darkcyan);border-radius:15px;'>Delete Becomes Successfull....!<br></h1>";
            } else {
                echo "<h1 style='text-align:center;font-size:40px;color:white;background-image:linear-gradient(to right,purple,darkred);border-radius:15px;'>Delete Becomes Unsuccessfull....!<br></h1>";
            }

        }
    }

    ?>