<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/hospital_staff.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/HospitalStaffController.php';

    $query = new HospitalStaffQuery;

    if(isset($_POST['submit'])) {

        $submit_request = $query->createLaboratory($_POST['patient_id'], $_POST['test_name'], $_POST['ammount']);
        
    }
