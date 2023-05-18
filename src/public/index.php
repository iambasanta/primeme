<?php

require("functions.php");
// require("router.php");
require("Database.php");

$config = require("config.php");

$db = new Database($config["database"]);
$users = $db->query("SELECT * FROM users")->fetchAll();

foreach ($users as $user) {
    echo "<li>".$user['username']."</li>";
}
