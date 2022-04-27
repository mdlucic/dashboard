<?php 

include "../../config/config.php";
require ("../../resources/html/header.php");

session_start();
error_reporting(0);





?>
  
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0">
    <title>Image.upload</title>




</head>
  
<body>


<div style="justify-content: center; text-align:center; text-color: white; color:white;">

    <h1>Upload Images</h1>

  
    <form method='post' action='upload_check.php' 
        enctype='multipart/form-data'>
        <input type='file' name='files[]' multiple />
        <br>
        <input class='button' type='submit' value='Submit' name='submit' />
    </form>

<br><br>

    <h1>Upload a Song</h1>


    <form method='post' action='upload_check.php'
                enctype='multipart/form-data'>
        <input type='text' name='artist' placeholder="Artist">
        <br>
        <input type='text' name='song_name' placeholder="Song Name">
        <br>

                <h3>Song File</h3>
                <input type='file' name='song[]' placeholder="Song File"/>
        <br>
                <h3>Album Art</h3>
                <input type='file' name='albumart[]' placeholder="Album Art" /></br>

        <input class='button' type='submit' value='Submit' name='submit' />
   </form>


<br> <br>

    <h1>Upload PDF</h1>
 
	<form style="padding-bottom:2em;" method='post' action='upload_check.php'
         enctype='multipart/form-data'>
        <input type='file' name='files[]' multiple />
        <br>
        <input class='button' type='submit' value='Submit' name='submit_pdf' />
    </form>
</div>
<?php
include_once("../../resources/html/footer.php");
?>
</body>
  
</html>
