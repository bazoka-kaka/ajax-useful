<?php

$existingNames = array("Benzion", "Devorah", "Rivkah", "Rachel", "Benjamin");

$name = '';
if (isset($_POST['suggestion'])) {
  $name = $_POST['suggestion'];

  foreach ($existingNames as $existingName) {
    if (!empty($name) && strpos(strtolower($existingName), strtolower($name)) !== false) {
      echo "<option value='$existingName'>";
    }
  }
}
