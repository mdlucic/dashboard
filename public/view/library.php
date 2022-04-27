<?php
ini_set("display_errors", true);
require("../../config/config.php");
include_once('../../resources/html/header.php');

session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>


    <!-- Gumbi -->
    <form style="margin-left:20px;" method="POST">
        <input class='button' type='submit' name='view_pdf' value='PDF' />
        <input class='button' type='submit' name='view_img' value='Images' />
    </form>




    <?php




    # View PDF

    if (isset($_REQUEST['view_pdf'])) {
        $stmt = $pdo->prepare('SELECT * FROM pdf');
        $stmt->execute();
        $pdflist = $stmt->fetchAll();
        echo '<div class="grid-container">';
        foreach ($pdflist as $file) {

            $title = str_replace("-", " ", $file['pdf_file_name']);
            $title = str_replace("_", " ", $title);
            $title = ucwords($title);
    ?>

            <div class="grid-container">
                <!-- File -->


                <a class="pdfbutton" href="../../library/uploads/pdf/<?php echo $file['pdf_file_name']; ?>" target="_blank"></br><?php echo substr($title, 0, -4); ?></a>
                </br>



                <!-- Delete Button -->
                <form name="remove2" action="library.php" method="post">
                    <button class="button_delete2" type="submit" name="delete_pdf" value="<?php
                                                                                            echo $file['id'] ?> | ../../library/uploads/pdf/<?php echo $file['pdf_file_name']; ?>" placeholder="DELETE">Delete</button>


                </form>
            </div>
    <?php
        }
    }


    if (isset($_POST['delete_pdf'])) {
        list($valuex, $pathx) = explode('|', $_POST['delete_pdf']);
        $pathx = str_replace("../../library/uploads/pdf/", "", $pathx);
        $id = $_POST['delete_pdf'];
        $stmt = $pdo->prepare("DELETE FROM pdf WHERE id =:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $truepath = getcwd() . $pathx;
        $truepath = str_replace("bin", "uploads/pdf", $truepath);
        $truepath = str_replace(' ', '', $truepath);


        if (!unlink($truepath)) {
            echo ("$truepath failed");
        } else {
            echo ("$truepath is gone");
        }
        if (!$stmt->rowCount()) {
            echo "Deletion Failed";
        }
    }
    ?>


    <?php

    # View Images
    $stmt = $pdo->prepare('select * from images');
    $stmt->execute();
    $imagelist = $stmt->fetchAll();

    if (isset($_REQUEST['view_img'])) {
        view_images($imagelist);
    }



    function view_images(&$pictures)
    {



        echo '<div class="grid-container">';
        foreach ($pictures as $image) {

    ?>


            <div class="grid-container, button" style="margin:10px;">

                <!-- slika -->

                <a class="downloadtext" href="../../library/uploads/images/<?php echo $image['image_file_name']; ?>" target="_blank" download>Download
                </a>

                </br>
                <a href="../../library/uploads/images/<?php echo $image['image_file_name']; ?>" target="_blank">
                    <img src="../../library/uploads/images/<?php echo $image['image_file_name']; ?>" title="<?= $image['image_file_namename'] ?>" width='192' height='108'>

                </a>

                <!-- Delete Button -->
                <form name="remove" action="library.php" method="post">
                    <button class="button_delete" type="submit" name="delete_item" value="<?php
                                                                                            echo $image['id'] ?> | ../../library/uploads/images/<?php echo $image['image_file_name']; ?>" placeholder="DELETE">Delete</button>


                </form>



            </div>
    <?php
        }
    }


    if (isset($_POST['delete_item'])) {

        list($valuex, $pathx) = explode('|', $_POST['delete_item']);
        $pathx = str_replace("./uploads", "", $pathx);
        $id = $_POST['delete_item'];
        $stmt = $pdo->prepare("DELETE FROM images WHERE id =:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $truepath = getcwd() . $pathx;
        $truepath = str_replace("bin", "uploads", $truepath);
        $truepath = str_replace(' ', '', $truepath);


        if (!unlink($truepath)) {
            echo ("$truepath failed");
        } else {
            echo ("$truepath is gone");
        }
        if (!$stmt->rowCount()) {
            echo "Deletion Failed";
        }
    }
    include_once('../../resources/html/footer.php');
    ?>
    </div>
</body>

</html>