<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';


    class MedTechQuery extends Query {

        public function listOfLaboratories() {

            $query = "SELECT patients.id as patient_id, patients.first_name, patients.last_name, laboratory_results.id as laboratory_results_id, 
            laboratory_results.test_name, laboratory_results.processed_by, laboratory_results.examine_date
            FROM laboratory_results 
            INNER JOIN patients 
            ON laboratory_results.patient_id = patients.id
            WHERE test_result = ''
            ";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function updateLaboratory() {

            $query = "";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "<script>
                alert('Laboratory updated'); 
                window.history.back();
                </script>";

            } else {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }
        }

    }