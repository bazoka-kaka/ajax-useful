<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css link -->
  <link rel="stylesheet" href="style.css" />
  <!-- jquery cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jquery and AJAX script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('form').submit(function(e) {
        e.preventDefault();
        let fullname = $("#fullname").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let password_confirmation = $("#password_confirmation").val();
        $("#registration_form_content").load("validate.php", {
          url: 'success.php',
          fullname: fullname,
          email: email,
          password: password,
          password_confirmation: password_confirmation
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
        <p>Already have an account? <a href="#" class="link">Login into your account</a></p>
      </div>
      <button type="submit">Register</button>
    </form>
  </div>
</body>

</html>