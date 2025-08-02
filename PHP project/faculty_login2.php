<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ID Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '_dbconnect.php';
        session_start();

        if (isset($_POST['email'])) {
            $to_email = $_POST['email'];

            $OTP = rand(100000, 999999);
            $_SESSION['OTP'] = $OTP;

            $user_exists = "SELECT * FROM `facultysignin` WHERE `email` = '$to_email'";
            $result = mysqli_query($conn, $user_exists);
            $num_rows = mysqli_num_rows($result);

            if ($num_rows > 0) {
                $subject = 'Testing PHP Mail';
                $message = "
                    <!DOCTYPE html>
                    <html>
                    <body>
                    
                        <div style='background-color: rgb(106, 106, 106); color: aliceblue; margin-left: 50px; margin-right:50px; padding: 20px;' width=100>
                            <h1 style='text-align:center;'>$OTP</h1>
                        </div>
                    
                    </body>
                    </html>";

                $headers = "Content-type: text/html; charset=UTF-8" . "\r\n";
                $headers .= 'From: user@gmail.com';

                if (mail($to_email, $subject, $message, $headers)) {
                    header("Location: faculty_login3.php");
                    exit();
                } 
                else {
                    echo '  <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Failed to send the OTP....!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                       <center><a class="btn btn-outline-primary btn-lg" href="faculty_login.php" role="button">Sign In</a><center>';

                }
            } 
            else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Email ID does not exsist....!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                   <center><a class="btn btn-outline-primary btn-lg" href="faculty_login.php" role="button">Sign In</a><center>';

            }
        } 
        else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Email is not set....!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    } 
    else {
        echo '<div class="jumbotron my-5 mx-5">
            <center><h1 class="display-4">Error...!</h1>
            <p class="lead">Sorry, You are not Sign In.</p>
            <hr class="my-4">
            <p>Click here to Sign In</p>
            <a class="btn btn-outline-danger btn-lg" href="faculty_login.php" role="button">Sign In</a><center>
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