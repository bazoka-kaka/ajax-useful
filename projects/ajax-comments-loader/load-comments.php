<?php
require_once __DIR__ . "/connection.class.php";

$commentsCount = $_POST['commentsCount'];

$conn = new Connection();
$stmt = $conn->pdo->prepare("SELECT * FROM comments LIMIT $commentsCount");

if (!$stmt->execute()) {
  echo "<p style='color: red;'>An error occured!</p>";
  exit();
}

$comments = $stmt->fetchAll();
if (empty($comments)) {
  echo "<p>No comments to show</p>";
} else {
  foreach ($comments as $comment) {
    echo "<h3 style='font-weight: 800'>" . $comment['AUTHOR'] . "</h3>";
    echo "<p>" . $comment['MESSAGE'] . "</p>";
  }
}
