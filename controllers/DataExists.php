<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';

    class DataExists {

        public static function exist_hmo_and_insurance(int $id) {

            $query = "SELECT * FROM patient_hmo_and_insurances WHERE patient_id = '$id'";
            $execute = mysqli_query(Database::connect(), $query);
            $data = mysqli_fetch_assoc($execute);

            if(!$data){
                return 'false';
            }

            return 'true';
        }

    }