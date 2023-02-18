<?php 

    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/patient.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/PatientController.php';

    $query = new PatientQuery;

    $outpatient_treatment = $query->outpatient_treatment($_SESSION['user_info']['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outpatient Treatment</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="icon" type="image/x-icon" href="../../../assets/img/logoo1.ico">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
      <!-- Vendor CSS Files -->
      <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="../../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="../../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="../../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="../../../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    
      <!-- Template Main CSS File -->
      <link href="../../../assets/css/style.css" rel="stylesheet">
    


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
    height: 380px;  /* Set the height of the module */
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

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="logoo d-flex align-items-center">
          <img src="../../../assets/img/logoo.png" alt="">
          <span class="d-none d-lg-block" style="color:#2098d1";><b>&nbsp;Alegario Cure</b><br><b style="color:#66cc33";>&nbsp;Hospital</b></span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
  
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End Search Bar -->
  
      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
  
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->
  
  
          <li class="nav-item dropdown pe-3">
      
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <span class="d-none d-md-block dropdown-toggle ps-2">Patient</span>
            </a><!-- End Profile Iamge Icon -->
  
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>AlegarioCure Hospital</h6>
                <span>We Commit to Care</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Need Help?</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
  
              <li>
                <form action="../function/session/logout.php" method="post">
                  <button class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                  </button>
                </form>
              </li>
              
            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
  
        </ul>
      </nav><!-- End Icons Navigation -->
  
    </header><!-- End Header -->
  
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
  
      <ul class="sidebar-nav" id="sidebar-nav">
  
  
          <li class="nav-heading">Dashboard Patient</li>
  
        
        <li class="nav-item">
          <a class="nav-link " href="outpatient/treatment.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span style="color: #2098d1;">Outpatient Treatment</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="insurance/application.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>HMO & Insurance</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="diet/meals.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Diet</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="surgery/schedule.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Surgery Schedule</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="laboratory/result.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Laboratory Result</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="../../environment/session/logout.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>logout</span>
          </a>
        </li>
  
  
      </ul>
  
    </aside><!-- End Sidebar-->
  
    <main id="main" class="main">
  
      <div class="pagetitle">
        <h1>Dashboard Patient</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard Patient</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
  
  <body>
  
    <br>
	   
    <div class="title"> 
    <h1 class="title2">AlegarioCure Services</h1>
    <br><br>
    
    <h4>From AlegarioCure Hopital Greetings <br> Magandang buhay para sa lahat ng<br> 
      aming pasyente. serbisyong maasahan<br>
      para sa lahat serbisyong nag bibigay<br> 
      alaga upang mapabilis ang paggaling.</h4>
    <br><br><br>
  <hr>
  
	<div class="module02" style="background-image: url('../../../assets/img/patientdash - Copy.png'); border-radius: 22px;">
    <h1><br>&nbsp;&nbsp;&nbsp;<b>OUTPATIENT TREATMENT</b></h1>
	<br><br><br>
    </div>
	   <hr>
    <br>
	<?php while($data = mysqli_fetch_assoc($outpatient_treatment)) {?>
	<div class="module">
    <div>
	    <h3>Outpatient Treatment</h3><br>
        <p>Patient id : <?php echo $data['patient_id'];?></p>
        <p>Treatment type : <?php echo $data['treatment_type'];?></p>
        <p>Treatment date : <?php echo $data['treatment_date'];?></p>
		   <hr>
		<p style="color: grey;">This form is a medical care where a patient receives treatment and care at a medical facility without being admitted as an inpatient.</p>
		
    </div>
	</div>
  <?php }?>
	

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
    <script src="../../../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/vendor/chart.js/chart.min.js"></script>
    <script src="../../../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../../../assets/vendor/quill/quill.min.js"></script>
    <script src="../../../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../../../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../../../assets/vendor/php-email-form/validate.js"></script>
  
    <!-- Template Main JS File -->
    <script src="../../../assets/js/main.js"></script>
</body>
</html>
