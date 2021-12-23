<?php 
    require('../includes/configure.php');

    $query = "SELECT * FROM infographic";
    
    $stmtselect = $database->prepare($query);
    $stmtselect->execute();

    while($row = $stmtselect->fetch(PDO::FETCH_ASSOC)) {
        $imgType = $row['mimetype'];
        $imgData = $row['info_image'];
        $imgName = $row['info_name'];
        $dateAdded = date("Y-m-d", strtotime($row['date_added']));

        echo '
        <div class="col-sm-3" style="margin-bottom: 20px; margin-top: 20px;">
            <div class="card h-100">
                <img class="card-img-top" src="data:'.$imgType.';base64,'.base64_encode($imgData).'"/>
                <div class="card-body">
                    <p align="center" style="color: #12100e ;">'.$imgName.'</p>
                    <button type="button" class="btn btn-primary" style="width:100%;" onclick=""> Archive</button>
                    <p align="center" style="margin-top:10px; font-size:80%;">Date Added: '.$dateAdded.'</p>
                </div>
            </div>
        </div>
        ';
    }

?>