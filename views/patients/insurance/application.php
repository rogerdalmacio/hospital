<?php 

    include '../../../environment/database.php';
    include '../../../environment/session/patient.php';

    
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
    <form action="../controllers/submit_insurance_application.php" method="post">
        <select name="provider">
        <option default value="AIA Philippines American Life and General Ins">AIA Philippines American Life and General Ins</option>
        <option value="Insular Life Assurance Company Limited">Insular Life Assurance Company Limited</option>
        <option value="Sun Life of Canada (Philippines)">Sun Life of Canada (Philippines)</option>
        <option value="Manufacturers Life Insurance Company (Phils.)">Manufacturers Life Insurance Company (Phils.)</option>
        <option value="BDO Life Assurance Company Inc">BDO Life Assurance Company Inc</option>
        <option value="BPI-AIA Life Assurance Corporation">BPI-AIA Life Assurance Corporation</option>
        <option value="Philippine Axa Life Insurance Corporation">Philippine Axa Life Insurance Corporation</option>
        <option value="Sun Life Grepa Financial Inc">Sun Life Grepa Financial Inc</option>
        <option value="United Coconut Planters Life Assurance Corporatio">United Coconut Planters Life Assurance Corporation</option>
        <option value="Pru Life Insurance Corporation of U.K.">Pru Life Insurance Corporation of U.K.</option>
        <option value="MEDICard">MEDICard</option>
        <option value="Intellicare">Intellicare</option>
        <option value="MaxiCare">MaxiCare</option>
        <option value="Philcare">Philcare</option>
        <option value="Insularcare">Insularcare</option>
        <option value="Valucare">Valucare</option>
        <option value="Fortunecare">Fortunecare</option>
        </select>
        <input type="text" name="membership_id" placeholder="membership id">
        <select name="tier">
            <option value="bronze">bronze</option>
            <option value="silver">silver</option>
            <option value="gold">gold</option>
        </select>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>