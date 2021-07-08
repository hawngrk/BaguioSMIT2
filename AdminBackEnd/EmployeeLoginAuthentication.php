<?php

    include("../includes/constructor.php");
    include("../includes/login.html");
    include("../includes/database.php");

    $empAccounts = [];

    $query = "SELECT employee_username, employee_password FROM employee_account";
    $result = $database->query($query);

    while($row = $result->fetch_assoc()) {
    $accounts[] = new Account($row['employee_username'], $row['employee_password']);
    }

    if(isset($_POST['loginButton'])) {
        $empUser = $_POST['user'];
        $empPass = $_POST['password'];

        foreach ($accounts as $cred) {
            $credUser = $cred->getUser();
            $credPass = $cred->getPassword();

            if ($empUser == $credUser && $empPass == $credPass) {
                session_start();
                header("Location: index.php");
                $_SESSION['username'] = $empUser;
            }
        }

        echo "<script>alert('Username or Password incorrect!')</script>";
        echo "<script>location.href='login.php'</script>";
    }

        ?>

