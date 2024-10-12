<?php

include('dbcon.php');

session_start();

$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "";
$userName = $userEmail = $userPassword = $userConfirmPassword = "";
if (isset($_POST['userRegister'])) {
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];

    if (empty($userName)) {
        $userNameErr = "Name Required";
    }
    if (empty($userEmail)) {
        $userEmailErr = "Email Required";
    } else {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :email"); //prepare() method check either email already present or not
        $query->bindParam(':email', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $userEmailErr = "Email already exist";
        }
    }
    if (empty($userPassword)) {
        $userPasswordErr = "Password Required";
    }
    if (empty($userConfirmPassword)) {
        $userConfirmPasswordErr = "Confirm Password Required";
    } else {
        if ($userPassword != $userConfirmPassword) {
            $userConfirmPasswordErr = "Password and Confirm Password should be same";
        }
    }

    if (empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)) {
        $query = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $query->bindParam(':name', $userName);
        $query->bindParam(':email', $userEmail);
        $query->bindParam(':password', $userPassword);
        $query->execute();
        echo "<script>alert('User added successfully'); location.assign('register.php');</script>";
    }
}



// login work start
$u_email = $u_pass = "";
$u_emailErr = $u_passErr = "";
if (isset($_POST['userLogin'])) {
    $u_email = $_POST['uEmail'];
    $u_pass = $_POST['uPass'];

    if (empty($u_email)) {
        $u_emailErr = "Email Required";
    }
    if (empty($u_pass)) {
        $u_passErr = "Password Required";
    }
    if (empty($u_emailErr) && empty($u_passErr)) {
        $query = $pdo->prepare("SELECT * FROM users WHERE email = :uEmail");
        $query->bindParam('uEmail', $u_email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($user);
        if ($user) {
            if ($u_pass == $user['password']) {

                if ($user['role_id'] == 1) {
                    $_SESSION['adminEmail'] = $user['email'];
                    $_SESSION['adminName'] = $user['name'];
                    // echo "<script>location.assign('login.php?success = login');</script>";
                    echo "<script>alert('login');location.assign('adminPanel/index.php')</script>";
                }
                if ($user['role_id'] == 2) {
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userEmail'] = $user['email'];
                    $_SESSION['userName'] = $user['name'];
                    // echo "<script>location.assign('login.php?success = login');</script>";
                    echo "<script>alert('login');location.assign('index.php')</script>";
                }
            } else {
                echo "<script>location.assign('login.php?error = invalid credentials')</script>";
            }
        } else {
            echo "<script>location.assign('login.php?error = user not found')</script>";
        }
    }
}
