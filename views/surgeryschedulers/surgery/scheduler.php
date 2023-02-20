<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/surgery_scheduler.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/SurgerySchedulerController.php';

    $query = new SurgerySchedulerQuery;

    $listOfDoctors = $query->all('doctors');

    $listOfSurgery = $query->all('surgery_list');

    $listOfSurgerySchedules = $query->listOfSortedSurgerySchedules();

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
    <form action="submit_schedule.php" method="post">
        <input type="number"  placeholder="patient id" name="patient_id" required>
        <select name="doctor" required>
            <option value="" selected disabled>Doctor</option>
            <?php while($doctor = mysqli_fetch_assoc($listOfDoctors)) {?>
                <option value=" <?php echo $doctor['id'] ?> "><?php echo $doctor['first_name'] . " " . $doctor['last_name'] ?></option>
            <?php }?>
        </select>
        <select name="surgery_type" required>
            <option value="" selected disabled>Surgery Type</option>
            <?php while($surgery = mysqli_fetch_assoc($listOfSurgery)) {?>
                <option value=" <?php echo $surgery['surgery'] ?> "><?php echo $surgery['surgery'] ?></option>
            <?php }?>
        </select>
        <input type="date" id="future-date" name="date" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
        <select name="time" id="">
            <option value="" selected disabled>Time</option>
            <option value="8:00 am">8:00 am</option>
            <option value="10:00 am">10:00 am</option>
            <option value="12:00 pm">12:00 pm</option>
            <option value="2:00 pm">2:00 pm</option>
            <option value="4:00 pm">4:00 pm</option>
        </select>
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
    <h3>Schedules</h3>
    <?php while($listOfSurgerySchedule = mysqli_fetch_assoc($listOfSurgerySchedules)) {?>
    <div>
          <p>Surgery id :<?php echo $listOfSurgerySchedule['id'] ?></p>
          <p>Patient name :<?php echo $listOfSurgerySchedule['patient_first_name'] . " " . $listOfSurgerySchedule['patient_last_name']?></p>
          <p>Doctor name: <?php echo $listOfSurgerySchedule['doctor_first_name'] . " " . $listOfSurgerySchedule['doctor_last_name']?></p>
          <p>Surgery type <?php echo $listOfSurgerySchedule['surgery_type'] ?></p>
          <p>Appoitment date: <?php echo $listOfSurgerySchedule['appointment_date'] ?></p>
          <p>Appointment time: <?php echo $listOfSurgerySchedule['appointment_time'] ?></p>
          <button type="submit" name="edit">edit</button>
          <button type="submit" name="submit">delete</button>
    </div>
    <?php }?>
</body>
</html>