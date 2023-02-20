<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

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

    }