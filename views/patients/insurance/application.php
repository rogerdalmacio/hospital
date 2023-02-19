<?php 

    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/patient.php';

    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Insurance Application</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" type="image/x-icon" href="img/logoo1.ico">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    
      <!-- Template Main CSS File -->
      <link href="assets/css/style.css" rel="stylesheet">
    


      <style>
  
  
        .button {
        border-radius: 18px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  /* Add a shadow */
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        transition: transform .2s;
      }
      
      .button1 {background-color: #4CAF50;} /* Green */
      .button2 {background-color: #008CBA;} /* Blue */
      .button3 {background-color: #8E8E88;} /* Log out color*/
      
      
      .button:hover {
        -ms-transform: scale(1.1); /* IE 9 */
        -webkit-transform: scale(1.1); /* Safari 3-8 */
        transform: scale(1.1); 
      }
      
      
      
      
       /* Add styles to the pop-up message */
      #alert {
        background-color: lightblue;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
        width: 200px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
      }
											
											
	.module {
    background-color: white;
    border: 2px solid white;  /* Add a border to the module */
    border-radius: 22px; 
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  /* Add a shadow */
    padding: 50px;  /* Add padding to the module */
    width: 530px;  /* Set the width of the module */
    height: 430px;  /* Set the height of the module */
    margin-left: auto;
    margin-right: auto; 
    
    }
											
    .module02 {
    height: 150px;  /* Set the height of the module */
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  /* Add a shadow */
    }	
	
											
        </style>
      

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
            <option value="bronze">Bronze</option>
            <option value="silver">Silver</option>
            <option value="gold">Gold</option>
        </select><br><br>
        <button type="submit" name="submit" class="button button1">Submit</button>
    </form>
 
 
 
		   <hr>
		<p style="color: grey;">Insurance application is a form filled out by an individual or business seeking to obtain insurance coverage, providing information about themselves and the assets or risks they wish to insure.</p>
		
    </div>
	</div>
	

	<br>
    <br>

    <hr>

    <!-- ======= Footer ======= -->
     <footer>
      <div class="container">
        <p align="center"><br>©2023 AlegarioCure Hospital | All Rights Reserved</p>
      </div>
    </footer>
    
     <script>
    
     // Show the pop-up message
  document.addEventListener("DOMContentLoaded", function() {
    alert("Welcome to Patient Dashboard😉✔");
  });
     </script>
    
  
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>
