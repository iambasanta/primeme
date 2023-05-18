<?php

class Database {

    public $connection;

    public function __construct() {
        try {
            $dsn = "mysql:host=db;dbname=primeme;user=root;password=root";

            $this->connection = new PDO($dsn);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }

    }

    public function query($query) {

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}

