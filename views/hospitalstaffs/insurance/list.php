<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/HospitalStaffController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';

    $query = new HospitalStaffQuery;
    
    $listOfHmoAndInsurances = $query->listOfHmoAndInsurance();

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
    <h3>patient insurance</h3>
    <?php while($data = mysqli_fetch_assoc($listOfHmoAndInsurances)) {?>
    <div>
        <p>Patient id : <?php echo $data['patient_id'] ?></p>
        <p>Patient name : <?php echo $data['first_name'] . " " . $data['last_name'] ?></p>
        <p>Provider : <?php echo $data['provider'] ?></p>
        <p>Membership id : <?php echo $data['membership_id'] ?></p>
        <p>Tier : <?php echo $data['tier'] ?></p>
        <p>Application date : <?php echo $data['application_date'] ?></p>
        <form action="">
            <input type="hidden" name="patient_id" value="<?php echo $data['patient_id'] ?>">
            <button type="submit" name="submit">Select Patient</button>
        </form>
    </div>
    <?php }?>
</body>
</html>