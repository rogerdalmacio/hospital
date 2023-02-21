<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/medtech.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/MedtechController.php';

    $query = new MedTechQuery;

    $listOfLaboraties = $query->listOfLaboratories();

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
    <h3>Laboraties</h3>
    <form>
        <input type="hidden">
        <input type="hidden">
        <input type="hidden">
        <div>
        <?php while($data = mysqli_fetch_array($listOfLaboraties)) {?>
            <p>patient id :<?php echo $data['patient_id'] ?></p>
            <p>patient name :<?php echo $data['first_name'] . " " . $data['last_name'] ?></p>
            <p>laboratory result id :<?php echo $data['laboratory_results_id'] ?></p>
            <p>test name :<?php echo $data['test_name'] ?></p>
            <p>processed by :<?php echo $data['processed_by'] ?></p>
            <p>examined date :<?php echo $data['examine_date'] ?></p>
        <?php } ?>
        </div>
        <button type="submit">Update</button>
        <button type="button" class="delete">Delete</button>
    </form>
</body>
</html>