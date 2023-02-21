<?php


    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    session_start();

    class HospitalStaffQuery extends Query{

        public function listOfHmoAndInsurance() {

            $query = "SELECT patient_hmo_and_insurances.patient_id, patients.first_name, patients.last_name, 
            patient_hmo_and_insurances.provider, patient_hmo_and_insurances.membership_id, patient_hmo_and_insurances.tier, 
            patient_hmo_and_insurances.application_date
            FROM patient_hmo_and_insurances
            INNER JOIN patients ON patient_hmo_and_insurances.patient_id = patients.id
            ";

            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function createLaboratory(int $patient_id, string $test_name, int $ammount) {

            $date = Query::date();
            $user = $_SESSION['user_info']['first_name'] . " " . $_SESSION['user_info']['last_name'];

            $query = "INSERT INTO `laboratory_results`(`id`, `patient_id`, `test_name`, `test_result`, `comments`, `amount`, 
            `examined_by`, `processed_by`, `examine_date`, `laboratory_result_date`, `created_at`, `updated_at`) 
            VALUES (null,'$patient_id','$test_name','','','$ammount','','$user','$date',null,'$date','$date')";

            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "<script>
                alert('Laboratory result submitted'); 
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
    