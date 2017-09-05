<?php

if (isset($_POST['submit'])) {

    include_once 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //Error Handling
    //Check for empty fields
    if (empty($username) || empty($password)) {
        header("Location: ../signup.php?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("Location: ../signup.php?signup=invalid");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user_username='$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                header("Location: ../signup.php?signup=usertaken");
                exit();
            } else {
                //Hashing the password
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                //Insert the user into the database
                $sql = "INSERT INTO users (user_username, user_password) VALUES ('$username', '$hashedPwd');";
                mysqli_query($conn, $sql);
                header("Location: ../signup.php?signup=success");
                exit();
            }
        }
    }

} else {
    header("Location: ../signup.php");
    exit();
}