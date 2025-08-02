<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ID Card</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .card {
            width: 300px;
            height: 400px;
            /* Adjust the height as needed */
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
            /* Adjust the margin-bottom value as needed */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card table {
            width: 100%;
            margin-top: 20px;
            /* Adjust the margin-top value as needed */
        }

        .card table td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .card table td:last-child {
            border-bottom: none;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once('tcpdf_module/tcpdf.php');
        session_start();
        $en = $_POST['en'];
        $name = $_POST['name'];

        if ($en == $_SESSION['Enrollment']) {
            $pdf = new TCPDF('P', 'mm', 'A6', true, 'UTF-8', false);

            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->SetY(50, false, false);
            $pdf->SetMargins(PDF_MARGIN_LEFT - 14, PDF_MARGIN_TOP - 31, PDF_MARGIN_RIGHT - 14);

            $pdf->SetAutoPageBreak(true, 0);

            $pdf->AddPage();

            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "project";

            $conn = mysqli_connect($server, $username, $password, $database);

            if (!$conn) {
                die("Error : " . mysqli_connect_error());
            }

            $sql = "SELECT `enrollment`, `name`, `sem`, `img` FROM `std_data` WHERE enrollment='$en' AND name='$name'";
            $image = mysqli_query($conn, $sql);

            $Enrollment = 0;
            $Name = "";
            $Sem = 0;
            $imgg = "";

            while ($row = mysqli_fetch_assoc($image)) {
                $Enrollment = $row['enrollment'];
                $Name = $row['name'];
                $Sem = $row['sem'];
                $imgg = $row['img'];
            }

            $html = <<<HTML
        <!DOCTYPE html>
            
            <div class="card">
                
                <h1>ID Card</h1>
                <img src="uploads/$imgg" alt="Profile Picture"><br>
                <table>
                    
                    <tr>
                        <td><strong>Enrollment:</strong></td>
                        <td>$Enrollment</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Name:</strong></td>
                        <td>$Name</td>
                    </tr>
                    
                    <tr>
                        <td><strong>Sem:</strong></td>
                        <td>$Sem</td>
                    </tr>
                </table>
            
            </div>
    </body>
    </html>
    HTML;

            $pdf->writeHTML($html, true, false, true, false, '');

            $pdf->Output('example.pdf', 'I');
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Enrollment Not Found...!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    } else {
        echo '<div class="jumbotron my-5 mx-5">
            <center><h1 class="display-4">Error...!</h1>
            <p class="lead">Sorry, You are not Sign In.</p>
            <hr class="my-4">
            <p>Click here to Sign In</p>
            <a class="btn btn-outline-danger btn-lg" href="2_Sign_in.php" role="button">Sign In</a><center>
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