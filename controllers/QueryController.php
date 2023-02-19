<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';

    class Query {

        public function all(string $table) {
            
            $query = "SELECT * FROM $table";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }