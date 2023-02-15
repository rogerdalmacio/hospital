<?php 

    include '../../../environment/database.php';
    include '../../../environment/session/patient.php';

    if(isset($_POST['submit'])) {

        $patient_id = $_SESSION['user_info']['id'];
        $provider = $_POST['provider'];
        $membership_id = $_POST['membership_id'];
        $tier = $_POST['tier'];

        $date = date("Y-m-d h:i:s");
        
        $sql = "INSERT INTO `patient_hmo_and_insurances`(`id`, `patient_id`, `processed_by`, `provider`, 
        `membership_id`, `tier`, `status`, `application_date`, `approval_date`, `created_at`, `updated_at`) 
        VALUES (null,'$patient_id',null,'$provider','$membership_id','$tier','pending','$date',
        null,'$date','$date')";

        $sqlexecute = mysqli_query($connection, $sql);

        if($sqlexecute) {
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

?>