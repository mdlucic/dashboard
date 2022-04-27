<?php

include "../../config/config.php";
require ("../../resources/html/header.php");

session_start();
error_reporting(0);

###############
#Upload image #
###############

if(isset($_POST['submit'])) {
	
    // Count total files
    $countfiles = count($_FILES['files']['name']);

    // Prepared statement
    $query = "INSERT INTO images (image_file_name, image_file_path) VALUES(?,?)";

    $statement = $pdo->prepare($query);
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {

        // File name
        $filename = $_FILES['files']['name'][$i];

        // Location
        $target_file = './images/'.$filename;
        // file extension
        $file_extension = pathinfo(
        $target_file, PATHINFO_EXTENSION);

        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");

        if(in_array($file_extension, $valid_extension)) {
            // Upload file
            if(move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file)
            ) {
                // Execute query
                $statement->execute(
                    array($filename,$target_file));
            }
        }
    }

    echo "File uploaded successfully";

}

###############
# Upload Song #
###############

if(isset($_POST['submit']))
{
        $countfiles = count($_FILES['song']['name']);


        $artist = $_POST['artist'];
        $song_name = $_POST['song_name'];



        $sql = "INSERT INTO music (artist, song_name, songfile_path, songfile_name, albumart_path, albumart_name) VALUES (:artist, :song_name, :songfile_path, :songfile_name, :albumart_path, :albumart_name)";

        $statement = $pdo->prepare($sql);


# File Name

for($i = 0; $i <$countfiles; $i++)
{

        $songfilename  = $_FILES['song']['name'][$i];
        $albumartfilename = $_FILES['albumart']['name'][$i];



        # Location
        $songfile = '../jukebox/music/' . $songfilename;
        $albumartfile = '../jukebox/album-art/' .       $albumartfilename ;






        # File Extension - Song
        $file_extension_song = pathinfo(
                $songfile, PATHINFO_EXTENSION);
        $file_extension_song = strtolower($file_extension_song);
        $valid_extension_song = array("mp3");



        # File Extension - Album Art
        $file_extension_albumart = pathinfo(
                $albumartfile, PATHINFO_EXTENSION);


$file_extension_albumart = strtolower($file_extension_albumart);
        $valid_extension_albumart = array("jpg", "png", "jpeg");




        if(in_array($file_extension_song, $valid_extension_song) && in_array($file_extension_albumart, $valid_extension_albumart))
        {


        if(move_uploaded_file(
                        $_FILES['song']['tmp_name'][$i], $songfile)
                        &&
                   move_uploaded_file(
                        $_FILES['albumart']['tmp_name'][$i], $albumartfile
                ))
                {
                echo "lol1";
                $statement->execute([
                ':artist' =>    $artist,
                ':song_name' => $song_name,
                ':songfile_path'=>      $songfile,
                ':songfile_name'=>      $songfilename,
                ':albumart_path'=>      $albumartfile,
                ':albumart_name'=>      $albumartfilename

                ]);

                }
        }
}
echo "Song Uploaded Succesfully";


}









##############
# Upload pdf #
##############


if(isset($_POST['submit_pdf'])) {

     // Count total files
     $countfiles = count($_FILES['files']['name']);

     // Prepared statement
     $query = "INSERT INTO pdf (pdf_file_name, pdf_file_path) VALUES(?,?)";

     $statement = $pdo->prepare($query);

     // Loop all files
     for($i = 0; $i < $countfiles; $i++) {

         // File name
         $filename = $_FILES['files']['name'][$i];

         // Location
         $target_file = './pdf/'.$filename;

         // file extension
         $file_extension = pathinfo(
                 $target_file, PATHINFO_EXTENSION);

         $file_extension = strtolower($file_extension);

         // Valid pdf extension
         $valid_extension = array("pdf");

         if(in_array($file_extension, $valid_extension)) {

             // Upload file
             if(move_uploaded_file(
                 $_FILES['files']['tmp_name'][$i],
                 $target_file)
             ) {

                 // Execute query
                 $statement->execute(
                     array($filename,$target_file));
             }
         }
     }

   echo "File uploaded successfully";

}

include "../../resources/html/footer.php";
?>

