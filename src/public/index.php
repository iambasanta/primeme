<?php

require("functions.php");
// require("router.php");
require("Database.php");

$config = require("config.php");
$db = new Database($config["database"]);

$id = $_GET["id"];

$query = "SELECT * FROM users where id = :id";

$users = $db->query($query, [':id' => $id])->fetchAll();

foreach ($users as $user) {
    echo "<li>".$user['username']."</li>";
}
