<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/DataExists.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';
    
    class PatientQuery extends Query{

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

        public function hmo_and_insurance_application(int $patient_id, string $provider, int $membership_id, string $tier) {

            $date = date("Y-m-d h:i:s");

            if(DataExists::exist_hmo_and_insurance($patient_id) == 'false'){
                
                $query = "INSERT INTO `patient_hmo_and_insurances`(`id`, `patient_id`, `processed_by`, `provider`, 
                `membership_id`, `tier`, `status`, `application_date`, `approval_date`, `created_at`, `updated_at`) 
                VALUES (null,'$patient_id',null,'$provider','$membership_id','$tier','pending','$date',
                null,'$date','$date')";
    
                $execute = mysqli_query(Database::connect(), $query);
    
                if($execute) {
                    echo "<script>
                    alert('Application submitted'); 
                    window.history.back();
                    </script>";
                } else {
                    echo "<script>
                    alert('something went wrong'); 
                    window.history.back();
                    </script>";
                }

            }

            echo "<script>
            alert('You already have an application'); 
            window.history.back();
            </script>";

        }

    }
