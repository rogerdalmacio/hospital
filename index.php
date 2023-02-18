<?php

    session_start();

    if($_SESSION['status']) {
        echo "<script>
        window.history.back();
        </script>";
    }

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
    <form action="controllers/LoginController.php" method="post">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="password" placeholder="password">
        <button type="submit" name="submit">login</button>
    </form>
</body>
</html>