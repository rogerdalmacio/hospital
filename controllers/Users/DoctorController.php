<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class DoctorQuery extends Query{

        public function appointmentList() {

            $query = "SELECT surgery_schedules.id, surgery_schedules.patient_id, patients.first_name, patients.last_name, 
            surgery_schedules.surgery_type, surgery_schedules.appointment_date
            FROM `surgery_schedules`
            INNER JOIN patients ON surgery_schedules.patient_id = patients.id ";

            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }