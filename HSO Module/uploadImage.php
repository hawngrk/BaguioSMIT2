<?php
require('../includes/configure.php');

if($_FILES) {
    
    $imgName = ($_FILES["file"]["name"]);
    $imgData = file_get_contents($_FILES["file"]["tmp_name"]);
    $imgType = ($_FILES["file"]["type"]);    
       
    if (substr($imgType, 0, 5) == "image") {
        $query = "INSERT INTO infographic(info_name, info_image, mimetype) VALUES(?, ?, ?)";

        try {
            $stmtinsert = $database->prepare($query);
            $stmtinsert->execute([$imgName, $imgData, $imgType]);
            echo "Image uploaded";

        } catch (PDOException $e) {
            echo 'Error in insert patient', $e->getMessage();
        }
    } else {
        throw new Exception(header('HTTP/1.0 400 Ensure that the file is an image type'));
    }
} else {
    throw new Exception(header('HTTP/1.0 400 Please select a file'));
}