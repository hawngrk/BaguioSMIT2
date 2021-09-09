<?php
    session_start();
    if(!isset($_SESSION['userlogin'])) {
        header("Location: patientDashboard.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SMIT+ | Settings</title>
    <!--Favicon-->
    <link rel="icon" href="../img/FaviSMIT+.png" type="image/jpg">
    <!--Custom CSS-->
    <link rel="stylesheet" href="../css/patientStyle.css">
         <!--Bootstrap-->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     
         <!-- Font Awesome JS -->
         <script src="https://kit.fontawesome.com/fcdb0fe9f3.js" crossorigin="anonymous"></script>
         <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
         <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
<!--Navigation Bar-->
    <nav class="navbar navbar-expand-md">
        <img src="../img/faviSMIT+ copy.png" class="logoImg" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="patientDashboard.php"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><i class="fas fa-user-circle"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="report.php"><i class="fas fa-file"></i> Report</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="settings.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="infographics.php"><i class="fas fa-file-image"></i> Infographics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="help.php"><i class="fas fa-question-circle"></i> Help</a>
                        <a class="dropdown-item" href="about.php"><i class="fas fa-info-circle"></i> About</a>
                        <a class="dropdown-item" href="reportlog.php"><i class="fas fa-info-circle"></i> Report Log</a>
                    </div>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
            <button id="signOut" class="signoutBtn" type="button"><i class="fas fa-sign-out-alt"></i></button>
        </div>
        <script>
        $(function(){
            $('#signOut').click(function(e){
                setTimeout('window.location.href = "logout.php"', 1000);
            });            
            });
        </script>
    </nav>

    <!--Page Content-->
    <div class="bodyWrapper">
        <div>
            <h1 class="helpheader">Settings</h1>
            <hr>
        </div>
        <div class="reportWrapper">
            <div class="cardd settingsCard">
                <div class="card-body settingBody">
                    <a href="#collapseChangePass" class="btn btnPass btn-outline-dark" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseChangePass">Change Password</a>
                    <a href="#collapseChangeNum" class="btn btnPass btn-outline-dark" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseChangeNum">Edit Mobile Number</a> <br>
                    <a href="#collapseChangeProf" class="btn btnPass btn-outline-dark" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseChangeProf">Edit Profile</a> <br>
                    <a href="#collapseChangePriority" class="btn btnPass btn-outline-dark" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseChangePriority">Edit Priority/Category</a> <br>
                </div>
                <div class="vertical"></div>
                <div class="collapseContent">
                    <div class="collapse" id="collapseChangePass">
                        <form>
                            <p>Choose a strong password and don't reuse it for other accounts.</p>
                            <input type="password" name="password" id="oldPassword" placeholder="Old Password" class="form-control settingInput formInpt" required>
                            <p class="paragraphReminders"><i class="smallReminders">Use at least 8 characters. Don’t use a password from another site, or something too obvious like your pet’s name.</i></p>
                            <input type="password" name="password" id="newPassword" placeholder="New Password" class="form-control settingInput formInpt" required>
                            <button id="changePs" name="loginButton" class="settingButton btn-primary btn buttonLogin" >Submit</button>
                            <hr>
                        </form>
                    </div>

                    <div class="collapse" id="collapseChangeNum">
                        <form action="changeNumber.php" id="changeNum">
                            <p>Enter the number that you’d like to use:</p>
                            <input id="contactNumber" type="number" name="mobile number" placeholder="+63" class="form-control settingInput formInpt" required>
                            <button name="loginButton" id="changeContact" class="settingButton btn btn-primary buttonLogin" form="changeNum">Change</button>
                            <hr>
                        </form>
                    </div>

                    <div class="collapse" id="collapseChangeProf">
                        <img src="../img/displ.png" id="profPic" alt="">
                        <button name="loginButton" class="settingButton btn btn-primary buttonLogin">Change Profile</button>
                        <hr>
                    </div>

                    <div class="collapse" id="collapseChangePriority">
                        <label for="category"> Priority Group *  </label>
                        <select class="formControl" id="category">
                            <option> A1:Health Care Workers </option>
                            <option> A2: Senior Citizens </option>
                            <option> A3: Adult with Comorbidity </option>
                            <option> A4: Frontline Personnel in Essential Sector, including Uniform Personnel </option>
                            <option> ROP: Rest of the Population </option>
                        </select>
                        <button name="loginButton" id="changeCategory" class="settingButton btn btn-primary buttonLogin">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#changePs').click(function(e) {
            var oldPassword = $('#oldPassword').val();
            var newPassword = $('#newPassword').val();

            $.ajax({
                type: 'POST',
                url: 'processes/changePassword.php',
                data: {oldPassword: oldPassword, newPassword: newPassword},
                success: function(data) {
                    alert(data);
                    setTimeout('window.location.href = "logout.php"');
                },
                error: function(data) {
                    alert(data);
                }

            });
        });

        $('#changePs').click(function(e) {
            var password = $('#oldPassword').val();
            var contactNumber = $('#contactNumber').val();
            
            $.ajax({
                type: 'POST', 
                url: 'processes/changeContact.php',
                data: {password: password, contact: contactNumber},
                success: function(data) {
                    alert(data);
                    setTimeout('window.location.href = "logout.php"');
                },
                error: function(data) {
                    alert(data);
                }
            });
        });

        $('#changeCategory').click(function(e) {
            var password = $('#oldPassword').val();
            var newCategory = $('#category').val();
            
            $.ajax({
                type: 'POST',
                url: 'processes/changeCategory.php',
                data: {password: password, category: newCategory},
                success: function(data) {
                    alert(data);
                    setTimeout('window.location.href = "logout.php"');
                },
                error: function(data) {
                    alert(data);
                }
            });
        });
    </script>
</body>

</html>

<style>
    .smallReminders {
        font-size: 12px;
    }
    
    .vertical {
        border-left: 1.5px solid rgb(217, 217, 217);
        height: 600px;
    }
    
    .collapseContent {
        margin-left: 5%;
        min-width: 100%;
    }
    
    .settingsCard {
        display: flex!important;
    }
    
    .settingBody {
        min-width: 100%;
        padding-right: -5%!important;
    }
    
    .settingInput,
    .settingButton,
    .paragraphReminders {
        margin-left: 5%;
        margin-top: 5%;
    }
</style>