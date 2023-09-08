<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- css link -->
  <link rel="stylesheet" href="style.css">
  <!-- jquery cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jquery script -->
  <script type="text/javascript">
    $(document).ready(function() {
      let commentsCount = 2;
      $("#addComments").click(function() {
        commentsCount++;
        $("#comments").load("load-comments.php", {
          commentsCount: commentsCount
        })
      })
    })
  </script>
  <title>AJAX Comments Loader</title>
</head>

<body>
  <h1>AJAX Comments Loader</h1>
  <div id="comments">
    <?php
    require_once __DIR__ . "/connection.class.php";

    $conn = new Connection();
    $stmt = $conn->pdo->prepare("SELECT * FROM comments LIMIT 2");

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
    ?>
  </div>
  <button id='addComments' type='button'>Add more comments</button>
</body>

</html>