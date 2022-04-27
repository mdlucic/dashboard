<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta content="width=device-width, initial-scale=1" name="viewport" />

  <link rel="stylesheet" href="/dashboard/resources/css/styles.css">

</head>

<body>
  <header>
    <div id="move_ball">
      <div id="move_ball_h">
        <div id="discoBallLight"></div>
        <div id="discoBall">
          <div id="discoBallMiddle"></div>
        </div>
      </div>
    </div>
    <?php
    echo '<p class="date">' . date("d/m/Y") . "</p><br>";
    include_once("/srv/www/apache/dashboard/resources/php/weather.php");
    ?>
  </header>







  <script src="/dashboard/resources/js/scripts.js"></script>
</body>

</html>
