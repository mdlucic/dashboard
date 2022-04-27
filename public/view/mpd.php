<?php
include "../../config/config.php";
include "../../resources/html/header.php";

error_reporting(0);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--If user tries to enter the page without loging in send them back. -->

</head>

<body>
    <br>

    <div style="justify-content: center; text-align:center; text-color: white; color:white;">


        <form method="post">

            <input class="button" type="submit" name="play" value="Play"> </br>
            <input class="button" type="submit" name="pause" value="Pause"></br></br>
            <input class="button" type="submit" name="next" value="Next"> </br>
            <input class="button" type="submit" name="prev" value="Prev"></br></br>

            <input class="button" type="submit" name="up" value="Vol_UP"> </br>
            <input class="button" type="submit" name="down" value="Vol_DOWN">

            <?php

            if (isset($_REQUEST['play'])) {
                shell_exec("mpc play");
            }


            if (isset($_REQUEST['pause'])) {
                shell_exec("mpc pause");
            }

            if (isset($_REQUEST['next'])) {
                shell_exec("mpc next");
            }


            if (isset($_REQUEST['prev'])) {
                shell_exec("mpc prev");
            }



            if (isset($_REQUEST['up'])) {
                shell_exec('amixer -q sset Master 2%+');
                echo "up";
            }

            if (isset($_REQUEST['down'])) {
                shell_exec("amixer -q sset Master 2%-");
            }

            include_once("../../resources/html/footer.php")

            ?>
    </div>