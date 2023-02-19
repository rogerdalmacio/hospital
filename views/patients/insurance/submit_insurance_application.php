<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/patient.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/PatientController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/DataExists.php';

    if(isset($_POST['submit'])) {

        $query = new PatientQuery;

        $application = $query->hmo_and_insurance_application($_SESSION['user_info']['id'], $_POST['provider'], $_POST['membership_id'], $_POST['tier']);
        
    }

?>