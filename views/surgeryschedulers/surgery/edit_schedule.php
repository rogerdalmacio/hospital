<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/surgery_scheduler.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/SurgerySchedulerController.php';

    $query = new SurgerySchedulerQuery;

    $edit_schedule = $query->editSchedule($_POST['id'], $_POST['surgery_type'], $_POST['appointment_date'], $_POST['appointment_time']);