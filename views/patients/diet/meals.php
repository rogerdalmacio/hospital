<?php 

    include '../../../environment/Database.php';
    include '../../../environment/session/patient.php';
    include '../../../controllers/QueryController.php';

    $query = new Query;

    $meals = $query->diet($_SESSION['user_info']['id']);
    

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
    <?php while($data = mysqli_fetch_assoc($meals)) {?>
    <div>
        <p>prepared by : <?php echo $data['nutritionists'];?></p>
        <p>classification : <?php echo $data['classification'];?></p>
        <div>
            <h3>meals</h3>
            <p>breakfast : <?php echo $data['breakfast'];?></p>
            <p>lunch : <?php echo $data['lunch'];?></p>
            <p>dinner : <?php echo $data['dinner'];?></p>
        </div>
    </div>
    <?php }?>
</body>
</html>