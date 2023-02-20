<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/surgery_scheduler.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/SurgerySchedulerController.php';

    if(isset($_POST['submit'])) {

        $query = new SurgerySchedulerQuery;

        $submitSchedule = $query->submitSurgerySchedule($_POST['patient_id'], $_POST['doctor'], $_POST['surgery_type'], $_POST['date'], $_POST['time']);

    }