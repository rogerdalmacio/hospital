<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/hospital_staff.php';
    
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
    <form action="submit_request.php" method="post">
        <input type="number" placeholder="patient id" name="patient_id" required>
        <input type="text" placeholder="test name" name="test_name" required>
        <input type="number" placeholder="ammount" name="ammount" required>
        <button type="submit" name="submit">submit</button>
    </form>
</body>
</html>