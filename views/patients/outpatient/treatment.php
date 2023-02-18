<?php 

    include '../../../environment/Database.php';
    include '../../../environment/session/patient.php';
    include '../../../controllers/QueryController.php';

    $query = new Query;

    $outpatient_treatment = $query->outpatient_treatment($_SESSION['user_info']['id']);

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
    <?php while($data = mysqli_fetch_assoc($outpatient_treatment)) {?>
    <div>
        <p>patient id : <?php echo $data['patient_id'];?></p>
        <p>treatment type : <?php echo $data['treatment_type'];?></p>
        <p>treatment date : <?php echo $data['treatment_date'];?></p>
    </div>
    <?php }?>
</body>
</html>