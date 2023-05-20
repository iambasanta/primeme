<?php

require("Validator.php");

$config = require("config.php");
$db = new Database($config["database"]);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];

    if (Validator::string($_POST["email"])) {
        $errors["email"] = "The email field is required.";
    } elseif (! Validator::email($_POST["email"])) {
        $errors["email"] = "Please enter a valid email address.";
    } elseif (!preg_match("/^[A-Za-z0-9._%+-]+@prime\.edu\.np$/", $_POST["email"])) {
        $errors["email"] = "The email address must be a valid prime.edu.np email.";
    }

    if (Validator::string($_POST["password"])) {
        $errors["password"] = "The password field is required.";
    } elseif (! Validator::length($_POST["password"], 8)) {
        $errors["password"] = "The password must be at least 8 characters long.";
    }

    if(empty($errors)){

        $user = $db->query("SELECT * FROM users WHERE email=:email AND password=:password",[
            "email" => $_POST["email"],
            "password" => $_POST["password"],
        ]);

        if ($user) {
            header("location:/");
        }
    }
}
    
require("views/login.view.php");
