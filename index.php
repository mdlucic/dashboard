<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Dashboard</title>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-aweso    me/4.7.0/css/font-awesome.min.css">

<meta content="width=device-width, initial-scale=1" name="viewport" />

  <link rel="stylesheet" href="./includes/css/styles.css">

</head>

<body>
<?php
include_once ('./resources/html/header.php')
?>


<!--
<h3>Search</h3>

<form target="_blank" action="https://www.freebird.hr/index.php/component/finder/search?" method="get">
<input type="text" name="q" placeholder="FreeBird Music"/>
</form>


<form target="_blank" action="https://www.discogs.com/search/" method="get">
<input type="text" name="q" placeholder="Discogs" />
</form>




<form target="_blank" action="https://www.youtube.com/results" method="get">
<input type="text" name="search_query" placeholder="Youtube"/>
</form>
-->

<br><br><br>
<form class="form_center_text"  target="_blank" action="https://www.startpage.com/do/dsearch?" method="get">
<input class="input_center" type="text" name="query" placeholder="Startpage"/>

</form>




<?php 
include_once ('./resources/html/footer.php');
?>
</body>
</html>

