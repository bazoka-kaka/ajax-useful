<!DOCTYPE html>
<html>

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function() {
      let commentsCount = 2;
      $("#btn").click(function() {
        commentsCount += 2;
        $("#comments").load("load-comments.php", {
          commentsNewCount: commentsCount
        });
      });
    });
  </script>
  <title>AJAX Get Data</title>
</head>

<body>
  <div id="comments"></div>
  <button id="btn">Show more comments</button>
</body>

</html>