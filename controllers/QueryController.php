<?php

    use Database;

    class Query {

        public function all(string $table) {
            
            $query = "SELECT * FROM $table";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }