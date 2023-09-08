<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- css link -->
  <link rel="stylesheet" href="style.css" />
  <!-- jquery cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- ajax jquery script -->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#name_input").keyup(function() {
        let name = $('#name_input').val();
        $.post('suggestions.php', {
          suggestion: name
        }, function(data, status) {
          $("#name_suggestions").html(data)
        })
      })
    })
  </script>
  <title>AJAX Name Suggestor</title>
</head>

<body>
  <input id="name_input" list="name_suggestions" type="text" name="name" autocomplete="off" placeholder="Enter name here">
  <datalist id="name_suggestions">
    <option id="test" value="">
  </datalist>
</body>

</html>