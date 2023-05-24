<?php

require("../Validator.php");

$config = require("../config.php");
$db = new Database($config["database"]);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (Validator::string($_POST["username"])) {
        $errors["username"] = "The username field is required.";
    } elseif (!Validator::length($_POST["username"], 4, 30)) {
        $errors["username"] = "The username must be at least 4 characters long.";
    }

    if (Validator::string($_POST["email"])) {
        $errors["email"] = "The email field is required.";
    } elseif (! Validator::email($_POST["email"])) {
        $errors["email"] = "Please enter a valid email address.";
    } elseif (! preg_match("/^[A-Za-z0-9._%+-]+@prime\.edu\.np$/", $_POST["email"])) {
        $errors["email"] = "The email address must be a valid prime.edu.np email.";
    }

    if (Validator::string($_POST["password"])) {
        $errors["password"] = "The password field is required.";
    } elseif (! Validator::length($_POST["password"], 8, 255)) {
        $errors["password"] = "The password must be at least 8 characters long.";
    }

    if (Validator::string($_POST["confirm_password"])) {
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

require("../views/register.view.php");
