<?php 
    require('../includes/configure.php');

    $query = "SELECT * FROM infographic";
    
    $stmtselect = $database->prepare($query);
    $stmtselect->execute();

    while($row = $stmtselect->fetch(PDO::FETCH_ASSOC)) {
        $imgType = $row['mimetype'];
        $imgData = $row['info_image'];
        echo '<img src="data:'.$imgType.';base64,'.base64_encode($imgData).'" width="300" height="600"/>';
    }

?>