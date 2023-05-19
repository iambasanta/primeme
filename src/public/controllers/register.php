<?php

$config = require("config.php");
$db = new Database($config["database"]);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (strlen($_POST["username"]) === 0) {
        $errors["username"] = "The username field is required.";
    }

    if (strlen($_POST["email"]) === 0) {
        $errors["email"] = "The email field is required.";
    } elseif (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Please enter a valid email address.";
    } elseif (!preg_match("/^[A-Za-z0-9._%+-]+@prime\.edu\.np$/", $_POST["email"])) {
        $errors["email"] = "The email address must be a valid prime.edu.np email.";
    }

    if (strlen($_POST["password"]) === 0) {
        $errors["password"] = "The password field is required.";
    } elseif (strlen($_POST["password"]) < 8) {
        $errors["password"] = "The password must be at least 8 characters long.";
    }

    if (strlen($_POST["confirm_password"]) === 0) {
        $errors["confirm_password"] = "The confirm password field is required.";
    } elseif ($_POST["password"] !== $_POST["confirm_password"]) {
        $errors["confirm_password"] = "The password and confirm password must match.";
    }

    if(empty($errors)){

        $db->query("INSERT INTO users(username, email, password, avatar) VALUES(:username, :email, :password, :avatar)",[
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "avatar" => null,
        ]);
    }
}

require("views/register.view.php");
