<?php
    require_once("configure.php");
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
    $account = $_SESSION['userlogin'];
    echo $account['patient_username'];
?>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <h1>Report Log</h1>
        <div class='report-log-container' id='report-log'>
        <?php 
            require_once '../require/getReport.php';

            foreach ($reports as $reportLog) {
                $reportId = $reportLog->getReportId();
                $reporterId = $reportLog->getReportPatientId();
                $dateReported = $reportLog->getDateReported();
                if($account['patient_id'] == $reporterId) {
                    echo "<div id='report-log{$reportId}'>
                    <h3>{$dateReported}</h3>
                    <button class='view-more-btn' type='submit' value='$reportId'>View More</button>
                    </div>";
                }
            }
        ?>
        </div>

        <div class="view-report">

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("Im here");
            $(".view-more-btn").click(function(){
                var repId = $(this).attr("value");
                console.log(repId);
                $.ajax({
                    url: 'viewReportDetails.php',
                    type: 'POST',
                    data: {"report": repId},
                    success: function (result) {
                        document.querySelector(".view-report").innerHTML = result;
                    }
                });
            });
        });
    </script>
</body>