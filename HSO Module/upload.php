<?php 
require('../includes/configure.php');

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>HSO | Manage Reports</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!-- Our Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/HSOModule.css" rel="stylesheet">


    <!-- Bootstrap-->
    <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../javascript/openModal.js"></script>
    <script src="../javascript/closeModal.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-brand-icon">
                    <img src="../img/logoo.png" style="width: 104%; margin-bottom:-19%; margin-top:-5%;"
                        alt="Baguio Logo">
                </div>
            </div>

            <ul class="list-unstyled components">
                <hr>
                <h4 id="headingNav1"> Health Service Office </h4>
                <hr>
                <h5 id="headingNav2">
                    <script src="../javascript/showDateAndTime.js"></script>
                </h5>
                <hr>

                <li>
                    <a href="HSOdash.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li>
                    <a href="ManageVaccineHome.php"><i class="fas fa-syringe"></i> Manage Vaccine</a>
                </li>
                <li>
                    <a href="ManagePatientHome.php"><i class="fas fa-user-circle"></i> Manage Patients</a>
                </li>
                <li>
                    <a href="ManageDeployment.php"><i class="fas fa-truck"></i> Manage Deployment</a>
                </li>
                <li class="active">
                    <a href="ManageReportHome.php" class="active"><i class="fas fa-sticky-note"></i> Reports</a>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <button type="button" class="btn btn-info" onclick='logout()'>
                    <span>Sign Out</span>
                </button>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <!-- Top Nav  -->
            <div class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-4 rounded-lg">
                <div class="container-fluid">
                    <div>

                        <button type="button" class="buttonTop3" id="generateReportBtn" onclick="openModal('uploadFileModal')"><i
                                class="fas fa-print"></i> Upload Infographic</button>
                    </div>
                    <button type="button" class="btn btn-warning buttonTop3 float-right"
                        onclick="openModal('archived')">
                        <i class="fas fa-inbox fa-lg"></i> Archive
                    </button>
                </div>
            </div>

            <div id="uploadFileModal" class="modal-window" >
                <div class="content-modal" style="width:50%;">
                    <div class="modal-header">
                        <h3> Upload Infographic</h3>
                        <span onclick="closeModal('uploadFileModal')" class="close">
                            <i class='fas fa-window-close'></i>
                        </span>
                    </div>
                    <div class="modal-body">
                        <form id="uploadForm" enctype="multipart/form-data">
                            <label for="imageName">Infograpic Title:</label>
                            <input class="input form-control" type="text" name="imageName" id="imgTitle" style="width:50%; height: 30px; margin: 0 0 20px 10px;" required>
                            <br>
                            <input class="btn btn-outline-secondary" type="file" name="image" id="infoImage">
                        </form>
                    </div>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal('uploadFileModal')">
                        Cancel
                    </button>
                    
                    <input class="btn btn-primary" type="button" name="submit" value="Upload" id="updBtn">
                    </div>
                </div>
            </div>
                
            
                <div class="row" alight="center" >
                    <?php 
                include('getImages.php');
                ?>
                </div>
   
        </div>
        <script>
            $('#updBtn').click(async function (e) {
                var files = document.getElementById("infoImage").files;
                var title = document.getElementById("imgTitle").value;
                var formData = new FormData();
                formData.append('file', files[0]);
                formData.append('title', title);
                $.ajax({
                    url: 'UploadImage.php',
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (result) {
                        console.log(result);
                        Swal.fire({
                            icon: 'success',
                            title: 'Upload Image',
                            showDenyButton: false,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#077bff',
                        });
                        setTimeout("location.reload(true);", 500);
                    },
                    error: function(result) {
                        Swal.fire({
                            icon: 'error',
                            text: result.statusText,
                            showDenyButton: false,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#077bff',
                        });
                    }
                });
            });
        </script>
        <script src="../javascript/logout.js"></script>
</body>

</html>