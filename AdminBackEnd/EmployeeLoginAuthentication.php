<?php

    include("../includes/constructor.php");
    include("../Admin/login.html");
    include("../includes/database.php");

    $empAccounts = [];

    $query = "SELECT employee_username, employee_password, employee_account_type, employee_picture FROM employee_account";
    $result = $database->query($query);

    while($row = $result->fetch_assoc()) {
    $accounts[] = new employeeAccounts($row['employee_username'], $row['employee_password'], $row['employee_account_type'], $row['employee_picture']);
    }

    if(isset($_POST['loginButton'])) {
        $empUser = $_POST['user'];
        $empPass = $_POST['password'];

        foreach ($accounts as $cred) {
            $credUser = $cred->getUser();
            $credPass = $cred->getPassword();

            if ($empUser == $credUser && $empPass == $credPass) {
                session_start();
                header("Location: index.html");
                $_SESSION['username'] = $empUser;
            }
        }

        echo "<script>alert('Username or Password incorrect!')</script>";
        echo "<script>location.href='login.php'</script>";
    }

        ?>

