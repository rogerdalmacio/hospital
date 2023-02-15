<?php

    include '../../../environment/database.php';
    include '../../../environment/session/patient.php';

    $userid = $_SESSION['user_info']['id'];

    $sql = " SELECT * FROM `laboratory_results` WHERE `patient_id` = $userid";
    $execute = mysqli_query($connection, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Laboratory result</h1>
    <div>
        <?php while($data = mysqli_fetch_assoc($execute)) {?>
        <p>result id : <?php echo $data['id'];?></p>
        <p>patient id : <?php echo $data['patient_id'];?></p>
        <p>name : <?php echo $_SESSION['user_info']['first_name'] . " " . $_SESSION['user_info']['last_name'];?></p>
        <p>gender : <?php echo $_SESSION['user_info']['gender'];?></p>
        <p>contact number : <?php echo $_SESSION['user_info']['contact_number'];?></p>
        <p>test name : <?php echo $data['test_name'];?></p>
        <p>test result : <?php echo $data['test_result'];?></p>
        <p>comments : <?php echo $data['comments'];?></p>
        <p>amount : <?php echo $data['amount'];?></p>
        <p>examined by : <?php echo $data['examined_by'];?></p>
        <p>processed by : <?php echo $data['processed_by'];?></p>
        <p>laboratory result date : <?php echo $data['laboratory_result_date'];?></p>
        <?php }?>
    </div>
</body>
</html>