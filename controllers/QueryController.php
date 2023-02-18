<?php

    include '../environment/Database.php';

    class Query {

        public function all(string $table) {
            
            $query = "SELECT * FROM $table";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function laboratory_results(int $patient_id) {

            $query = "SELECT * FROM laboratory_results WHERE patient_id = $patient_id";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;
        }

        public function outpatient_treatment(int $patient_id) {
            
            $query = "SELECT * FROM outpatient_treatments WHERE patient_id = $patient_id";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function surgery_schedule(int $patient_id) {

            $query = "SELECT * FROM surgery_schedules WHERE patient_id = $patient_id";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function diet(int $patient_id) {

            $query = "SELECT * FROM patient_diets WHERE patient_id = $patient_id";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;
            
        }

    }