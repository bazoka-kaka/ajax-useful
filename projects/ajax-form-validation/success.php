<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>
  <div style="text-align: center;">
    <h1 style="color: green;">Success!</h1>
    <p>No errors found.</p>
  </div>
</body>

</html>