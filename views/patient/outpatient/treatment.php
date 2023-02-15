<?php 

    include '../../../environment/database.php';
    include '../../../environment/session/patient.php';

    $userid = $_SESSION['user_info']['id'];

    $sql = "SELECT * FROM `outpatient_treatments` WHERE `patient_id` = $userid";
    $sqlexecute = mysqli_query($connection, $sql);

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
    <?php while($data = mysqli_fetch_assoc($sqlexecute)) {?>
    <div>
        <p>patient id : <?php echo $data['patient_id'];?></p>
        <p>treatment type : <?php echo $data['treatment_type'];?></p>
        <p>treatment date : <?php echo $data['treatment_date'];?></p>
    </div>
    <?php }?>
</body>
</html>