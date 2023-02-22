<?php

    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/patient.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/PatientController.php';

    $query = new PatientQuery;
    
    $labresult = $query->laboratory_results($_SESSION['user_info']['id']);

    $labresultdata = mysqli_fetch_assoc($labresult);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RESULT</title>
    <!-- Favicons -->
 <link rel="icon" type="image/x-icon" href="../../../assets/img/logoo1.ico">
</head>

<style>
  /* Add CSS styles here */
  /* Define the table layout */
  table {
    width: 75%;
    margin: auto;
    border-collapse: collapse;
    text-align: left;
  }
  /* Define the table headers */
  th {
    background-color: #f2f2f2;
    padding: 12px;
    border: 1px solid #ddd;
  }
  /* Define the table data */
  td {
    padding: 12px;
    border: 1px solid #ddd;
  }


  .module {
    background-color: white;
    border: 2px solid white;  /* Add a border to the module */
    border-radius: 22px; 
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  /* Add a shadow */
    padding: 50px;  /* Add padding to the module */
    width: 720px;  /* Set the width of the module */
    height: 580px;  /* Set the height of the module */
    margin-left: auto;
    margin-right: auto; 
    
  }



  
body {
  background-image: url('../../../assets/img/pexels-tima-miroshnichenko-5355865.jpg');  /* Add the background image */
  background-repeat: no-repeat;  /* Do not repeat the image */
  background-size: cover;  /* Resize the image to cover the entire background */
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



#screenshot-btn {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  width: fit-content;
  margin: 0 auto;
}

</style>



</head>
<body>
  <br>
  <br><br>
  <div class="module" style="background-image: url('../../../assets/img/photography-paper-17-640x360.jpg')">
    <img src="../../../assets/img/logoo-removebg.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/logoo-removebg.png"/>
    
	
<h1>&nbsp; Patient Laboratory Results</h1>
<table>
  <tr>
    <th>Result ID</th>
    <th>Patient ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Contact Number</th>
    <th>Examined By</th>
    <th>Processed By</th>
    <th>Laboratory Result Date</th>
    <th>Amount</th>
  </tr>
  <tr>
    <td><?php echo $labresultdata['id'];?></td>
    <td><?php echo $labresultdata['patient_id'];?></td>
    <td><?php echo $_SESSION['user_info']['first_name'] . " " . $_SESSION['user_info']['last_name'];?></td>
    <td><?php echo $_SESSION['user_info']['gender'];?></td>
    <td><?php echo $_SESSION['user_info']['contact_number'];?></td>
    <td><?php echo $labresultdata['examined_by'];?></td>
    <td><?php echo $labresultdata['processed_by'];?></td>
    <td><?php echo $labresultdata['laboratory_result_date'];?></td>
    <td><?php echo $labresultdata['amount'];?></td>
  </tr>

<br>

  <table><br><br>
    <tr>
      <th>Test Name</th>
      <th>Test Result</th>
      <th>Comments</th>
    </tr>
    <?php while($data = mysqli_fetch_assoc($labresult)) {?>
    <tr>
     <td><?php echo $data['test_name'];?></td>
     <td><?php echo $data['test_result'];?></td>
     <td><?php echo $data['comments'];?></td>
    </tr>
    <?php }?>  

</table>




   <script>
  
	 // Show the pop-up message
document.addEventListener("DOMContentLoaded", function() {
  alert("Here is the result of your laboratory test.");
});
   </script>
   
   
   
   
   
   <script>
			// Function for Screenshot 
// Capture the screenshot on button click
document.getElementById("screenshot-btn").addEventListener("click", function() {
    // Capture the screenshot of the document body
    html2canvas(document.body).then(function(canvas) {
        // Convert the canvas to base64 encoded image and save it to local storage
        localStorage.setItem("screenshot", canvas.toDataURL());
        // Display the captured image in the image element
        document.getElementById("screenshot-img").src = localStorage.getItem("screenshot");
    });
});

// Save the captured screenshot before leaving the page
window.onbeforeunload = function() {
    localStorage.setItem("screenshot", document.getElementById("screenshot-img").src);
};

// Load the saved screenshot when the page loads
window.onload = function() {
    if (localStorage.getItem("screenshot")) {
        document.getElementById("screenshot-img").src = localStorage.getItem("screenshot");
    }
};

   </script>
   

<br><br><br>
<p>"This form is intended for patient results based on a test form filled out by the patient. Any results submitted on this form that do not correspond to a test form completed by the patient will not be accepted."</p>
<br><center><p>©2023 AlegarioCure Hospital | All Rights Reserved</p></center>
</div>
<br><br><br>
</body>

  <button id="screenshot-btn">Take Screenshot</button>
  <img id="screenshot-img" src="">
	  <br><br><br>


</html>
