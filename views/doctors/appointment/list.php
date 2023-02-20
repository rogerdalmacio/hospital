<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/DoctorController.php';

    $query = new DoctorQuery;
    
    $appointmentList = $query->appointmentList();

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
    <h3>Appointments</h3>
    <?php while($data = mysqli_fetch_assoc($appointmentList)) { ?>
    <div>
        <p>Patient id : <?php echo $data['patient_id'] ?> </p>
        <p>Patient name : <?php echo $data['first_name'] . " " . $data['last_name'] ?> </p>
        <p>Surgery type : <?php echo $data['surgery_type'] ?> </p>
        <p>Appointment date : <?php echo $data['appointment_date'] ?></p>
        <form action="">
            <input type="hidden" name="appointment_id" value="<?php echo $data['id'] ?>">
            <button type="submit" name="submit">Done</button>
        </form>
    </div>
    <?php }?>
</body>
</html>