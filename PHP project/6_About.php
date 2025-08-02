<?php
include "nav_bar_for_all.php";

if (isset($_SESSION['student'])) {
  $login = true;
} else {
  $login = false;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<style>
  /* Add your CSS styling here */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow-y: scroll;
    scroll-behavior: smooth;
    /* Add the ability to scroll */
  }

  body::-webkit-scrollbar {
    display: none;
  }


  /* Customize the styling to fit your design */
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  h1 {
    text-align: center;
  }

  /* Add more CSS styles as needed */
</style>
</head>

<body>

  <?php

  if ($login) {

    echo '<div class="container">
    <h1>ID Card Generator</h1>
    <p>Welcome to the ID Card Generator! Create professional-looking ID cards quickly and easily. Whether you need ID
      cards for your employees, students, or event participants, our user-friendly tool will help you design and
      generate customized ID cards in just a few simple steps.</p>

    <h2>How It Works</h2>
    <ol>
      <li>Choose a Template: Select a template that suits your needs from our wide range of professionally designed ID
        card templates. We offer various styles and layouts to accommodate different industries and purposes.</li>
      <li>Customize Your ID Card: Personalize your ID card by adding relevant details such as the cardholders name,
        photo, job title, company/school logo, and any other necessary information. Our intuitive editor allows you to
        easily modify text, fonts, colors, and images to create a unique and professional ID card.</li>
      <li>Generate and Download: Once you are satisfied with the design, simply click the "Generate" button. Our system
        will instantly generate a high-resolution ID card for you. You can then download the ID card in a printable
        format, ready for distribution.</li>
    </ol>

    <h2>Features and Benefits</h2>
    <ul>
      <li>User-Friendly Interface: Our intuitive interface makes it easy for anyone to create ID cards without any
        design experience.</li>
      <li>Customizable Templates: Choose from a variety of professionally designed templates that can be tailored to
        your specific needs.</li>
      <li>Photo Upload: Easily upload and incorporate a photo of the cardholder to enhance the cards authenticity and
        personalization.</li>
      <li>Secure Information: Safeguard sensitive information by customizing the security features of the ID card, such
        as barcodes, holograms, or QR codes.</li>
      <li>Print-Ready Format: Download the generated ID card in high-resolution PDF or image formats, suitable for
        professional printing.</li>
      <li>Time and Cost Savings: Generate ID cards on demand, eliminating the need for outsourcing or purchasing
        expensive design software.</li>
    </ul>

    <h2>Get Started Now</h2>
    <p>Creating professional ID cards has never been easier. Start using our ID Card Generator today and streamline your
      identification process. Ensure security and professionalism with customized ID cards for your organization,
      institution, or event.</p>

    <p>Note: The ID Card Generator is intended for personal and non-commercial use. It is the responsibility of the user
      to comply with legal and ethical requirements regarding ID card usage.</p>
  </div>
</body>

</html>';
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