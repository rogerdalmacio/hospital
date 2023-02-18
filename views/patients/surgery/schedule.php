<?php 

    include '../../../environment/Database.php';
    include '../../../environment/session/patient.php';
    include '../../../controllers/QueryController.php';

    $query = new Query;

    $surgery_schedules = $query->surgery_schedule($_SESSION['user_info']['id']);

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
    <?php while($data = mysqli_fetch_assoc($surgery_schedules)) {?>
    <div>
        <p>doctor_id : <?php echo $data['doctor_id'];?></p>
        <p>surgery type : <?php echo $data['surgery_type'];?></p>
        <p>appoitment date : <?php echo $data['appointment_date'];?></p>
    </div>
    <?php }?>
</body>
</html>