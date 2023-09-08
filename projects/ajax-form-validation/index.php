<?php
require_once __DIR__ . '/create-captcha.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css link -->
  <link rel="stylesheet" href="style.css" />
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- jquery cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jquery and AJAX script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#reload_captcha').click(function() {
        $("#captcha_input").load('reload-captcha.php', function() {
          alert("Captcha reloaded!");
        });
      })
      $('form').submit(function(e) {
        e.preventDefault();
        let fullname = $("#fullname").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let password_confirmation = $("#password_confirmation").val();
        let captcha = $("#captcha").val();
        $("#registration_form_content").load("validate.php", {
          url: 'success.php',
          fullname: fullname,
          email: email,
          password: password,
          password_confirmation: password_confirmation,
          captcha: captcha
        })
      })
    })
  </script>
  <title>AJAX Form Validation</title>
</head>

<body>
  <div class="inner-container">
    <h1>Registration Form | AJAX Form Validation</h1>
    <form action="success.php" method="POST">
      <div id="registration_form_content">
        <label for="fullname">Fullname</label>
        <input type="text" name="fullname" id="fullname" placeholder="Enter your full name here">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email here">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password here">
        <label for="password_confirmation">Password confirmation</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Please re-enter your password">
        <div id="captcha_input" style="display: flex; flex-direction: column">
          <div>
            <img class="captcha" src="<?php echo createCaptcha(); ?>" alt="">
            <i id="reload_captcha" class="fa-solid fa-rotate-right" style="cursor:pointer; font-size: 1.2rem"></i>
          </div>
          <input type="text" id="captcha" name="captcha" placeholder="Please re-enter the captcha">
        </div>
        <p>Already have an account? <a href="#" class="link">Login into your account</a></p>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>

</html>