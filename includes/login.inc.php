<?php

session_start();

if (isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Error handlers
    //Check if inputs empty
    if (empty($username) || empty($password)) {
        header("Location: ../index.php?login=tempty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../index.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-Hashing Password
                $hashedPwdCheck = password_verify($password, $row['user_password']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //Log in the user
                    $_SESSION['u_id'] = $row[user_id];
                    $_SESSION['u_username'] = $row[user_username];
                    header("Location: ../index.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=error");
    exit();
}