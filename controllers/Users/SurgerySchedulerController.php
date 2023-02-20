<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class SurgerySchedulerQuery extends Query{

        public function submitSurgerySchedule(int $patient_id, int $doctor_id, string $surgery, string $appointmentDate, string $appointmentTime) {

            try {
            $date = date("Y-m-d h:i:s");

            $query = "INSERT INTO `surgery_schedules`(`id`, `patient_id`, `doctor_id`, `surgery_type`, `appointment_date`, `appointment_time`, `created_at`, `updated_at`) 
            VALUES (null,'$patient_id','$doctor_id','$surgery','$appointmentDate','$appointmentTime','$date','$date')";
            $execute = mysqli_query(Database::connect(), $query);

            echo "<script>
            alert('Schedule queued'); 
            window.history.back();
            </script>";

            } catch (Exception $e) {

                
                if(mysqli_errno(Database::connect()) == 0) {
                    
                    echo "<script>
                    alert('Schedule already taken'); 
                    window.history.back();
                    </script>";

                } else {

                    echo "<script>
                    alert('Error'); 
                    window.history.back();
                    </script>";

                }

            }

        }

        public function listOfSortedSurgerySchedules() {

            $query = "SELECT surgery_schedules.id, surgery_schedules.surgery_type, surgery_schedules.appointment_date, 
            surgery_schedules.appointment_time, patients.first_name as patient_first_name, 
            patients.last_name as patient_last_name, doctors.first_name as doctor_first_name, doctors.last_name as doctor_last_name 
            FROM `surgery_schedules` INNER JOIN `patients` ON surgery_schedules.patient_id = patients.id 
            INNER JOIN doctors ON surgery_schedules.doctor_id = doctors.id
            WHERE status = 0
            ORDER BY appointment_date DESC";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }