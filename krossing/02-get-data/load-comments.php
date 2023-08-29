<?php

require_once "./dbh.php";

$commentsNewCount = $_POST['commentsNewCount'];

$sql = "SELECT * FROM comments LIMIT $commentsNewCount";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>" . $row['AUTHOR'] . "<br>" . $row['MESSAGE'] . "</p>";
  }
}
