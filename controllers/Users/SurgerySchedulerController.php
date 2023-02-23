<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class SurgerySchedulerQuery extends Query{

        public function submitSurgerySchedule(int $patient_id, int $doctor_id, string $surgery, string $appointmentDate, string $appointmentTime) {

            try {

            $date = Query::date();

            $query = "INSERT INTO `surgery_schedules`(`id`, `patient_id`, `doctor_id`, `surgery_type`, `appointment_date`, `appointment_time`,`status`, `created_at`, `updated_at`) 
            VALUES (null,'$patient_id','$doctor_id','$surgery','$appointmentDate','$appointmentTime',false,'$date','$date')";
            $execute = mysqli_query(Database::connect(), $query);

            echo "<script>
            alert('Schedule queued'); 
            window.history.back();
            </script>";

            } catch (Exception $e) {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }

        }

        public function editSchedule(int $id, string $surgeryType, string $appointmentDate, string $appointmentTime) {
            
            $date = Query::date();

            $query = "UPDATE `surgery_schedules` SET `surgery_type`='$surgeryType',
            `appointment_date`='$appointmentDate',`appointment_time`='$appointmentTime',`updated_at`='$date' WHERE id = $id";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "Successfully updated";

            } else {

                echo "Something went wrong";

            }

        }

        public function deleteSchedule(int $id) {

            $query = "DELETE FROM `surgery_schedules` WHERE id = '$id'";
            $execute = mysqli_query(Database::connect(), $query);


            if($execute) {

                echo "Successfully deleted";

            } else {

                echo "Something went wrong";

            }

        }

        public function listOfSortedSurgerySchedules() {

            $query = "SELECT surgery_schedules.id, surgery_schedules.surgery_type, surgery_schedules.appointment_date, 
            surgery_schedules.doctor_type, surgery_schedules.appointment_time, patients.first_name as patient_first_name, 
            patients.last_name as patient_last_name
            FROM `surgery_schedules` 
            INNER JOIN `patients` 
            ON surgery_schedules.patient_id = patients.id 
            WHERE status = 'pending'
            ORDER BY appointment_date DESC";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }