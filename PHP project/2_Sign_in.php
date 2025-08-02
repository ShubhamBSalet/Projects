<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sign up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    a:link,
    a:visited {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <section class="vh-100" style="background-color: #eee;">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-10 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>

                    <form class="mx-1 mx-md-4" action="2.1_otp.php" method="post">
                      <div class="d-column-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                       
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="enrollment">Your Enrollment</label>
                          <input type="text" pattern="[0-9]{12}" name="enrollment" id="enrollment" class="form-control" required>
                        </div>
                       
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="email">Your Email</label>
                          <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                      
                      </div>

                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4 my-3">
                        <button type="submit" class="btn btn-outline-primary btn-lg" value="otp" name="otp">OTP</button>
                        <a href="project.php" class="btn btn-outline-primary btn-lg mx-5">BACK</a>
                      </div>
                    </form>
                  </div>
                  <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                    <img src="img_avatar1.jpg" class="" alt="Sample image" height="90%">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
</body>

</html>