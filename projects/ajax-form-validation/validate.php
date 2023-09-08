<?php

$fullname = '';
$email = '';
$password = '';
$password_confirmation = '';

$errors = [
  'fullname' => '',
  'email' => '',
  'password' => '',
  'password_confirmation' => ''
];

define("REQUIRED_FIELD_ERROR", "*This field is required");
define("INVALID_EMAIL_ERROR", "*Email is invalid");
define("INVALID_STRLEN_ERROR", "*Characters length must be between 4 and 50");
define("PASSWORD_STRLEN_ERROR", "*Password length must be between 8 and 50");
define("PASSWORD_CONFIRM_ERROR", "*Password and password confirmation doesn&apos;t match");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $url = post_input('url');
  $fullname = post_input('fullname');
  $email = post_input('email');
  $password = post_input('password');
  $password_confirmation = post_input('password_confirmation');

  if (empty($fullname)) {
    $errors['fullname'] = REQUIRED_FIELD_ERROR;
  } else if (strlen($fullname) < 4 || strlen($fullname) > 50) {
    $errors['fullname'] = INVALID_STRLEN_ERROR;
  }

  if (empty($email)) {
    $errors['email'] = REQUIRED_FIELD_ERROR;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = INVALID_EMAIL_ERROR;
  }

  if (empty($password)) {
    $errors['password'] = REQUIRED_FIELD_ERROR;
  } else if (strlen($password) < 8 || strlen($password) > 50) {
    $errors['password'] = PASSWORD_STRLEN_ERROR;
  }

  if (empty($password_confirmation)) {
    $errors['password_confirmation'] = REQUIRED_FIELD_ERROR;
  }

  if (!(empty($password) || empty($password_confirmation)) && strcmp($password, $password_confirmation) !== 0) {
    $errors['password_confirmation'] = PASSWORD_CONFIRM_ERROR;
  }

  if (empty($errors['fullname']) && empty($errors['email']) && empty($errors['password']) && empty($errors['password_confirmation'])) {
    echo "<div style='background-color: lightgreen; color: white; text-align: center; display: block; padding: 5px'>Success</div>";

    // submit to intended form
    $url = $url;
    $data = ['fullname' => $fullname, 'email' => $email, 'password' => $password, 'password_confirmation' => $password_confirmation];

    // use key 'http' even if you send the request to https://...
    $options = [
      'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data),
      ],
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === false) {
      /* Handle error */
      echo "There's an error.";
    }
  }
}

function post_input($field)
{
  $result = isset($_POST[$field]) ? $_POST[$field] : null;
  return stripslashes(htmlspecialchars($result));
}
?>

<label for="fullname">Fullname</label>
<input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>" placeholder="Enter your full name here">
<?php if (!empty($errors['fullname'])) : ?>
  <small><?php echo $errors['fullname']; ?></small>
<?php endif; ?>
<label for="email">Email</label>
<input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter your email here">
<?php if (!empty($errors['email'])) : ?>
  <small><?php echo $errors['email']; ?></small>
<?php endif; ?>
<label for="password">Password</label>
<input type="password" name="password" id="password" value="" placeholder="Enter your password here">
<?php if (!empty($errors['password'])) : ?>
  <small><?php echo $errors['password']; ?></small>
<?php endif; ?>
<label for="password_confirmation">Password confirmation</label>
<input type="password" name="password_confirmation" id="password_confirmation" placeholder="Please re-enter your password">
<?php if (!empty($errors['password_confirmation'])) : ?>
  <small><?php echo $errors['password_confirmation']; ?></small>
<?php endif; ?>
<p>Already have an account? <a href="#" class="link">Login into your account</a></p>