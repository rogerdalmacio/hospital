<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/nutritionist.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once  $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/NutritionistController.php';
    
    $query = new NutritionistQuery;

    $listOfPatients = $query->all('patients');
    $listOfpatientsWithDiet = $query->patientsWithDiet();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
      .button3 {background-color: #ff6666;} /* Log out color*/
      
      
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
        
		
		    .module02 {
    height: 170px;  /* Set the height of the module */
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
                  <a href="../../environment/session/logout.php" class="dropdown-item d-flex align-items-cente">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Log Out</span>
                  </a>
              </li>
              
            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
  
        </ul>
      </nav><!-- End Icons Navigation -->
  
    </header><!-- End Header -->
  
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
  
      <ul class="sidebar-nav" id="sidebar-nav">
  
  
          <li class="nav-heading">Diet Management</li>
  
        
        <li class="nav-item">
          <a class="nav-link " href="management.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Diet Management</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link " href="diet/index.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Log Out</span>
          </a>
        </li>
  
      </ul>
  
    </aside><!-- End Sidebar-->

     <main id="main" class="main">
  
      <div class="pagetitle">
        <h1>Diet Management</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Diet Management</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->





<body>
    <div>
        <h1>Diet management</h1>
        <h3>patients</h3>
        <?php while($data = mysqli_fetch_assoc($listOfPatients)) { ?>
        <form class="addDiet">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <input type="hidden" name="patient_name" value="<?php echo $data['first_name'] . " " . $data['last_name'] ?>">
            <p><?php echo $data['id'] ?></p>
            <p><?php echo $data['first_name'] . " " . $data['last_name'] ?></p>
            <button type="submit" class="submit button button1" style="color: black;">Add Diet</button>
        </form>
        <?php } ?>
        <h3>patients with diet</h3>
        <?php while($data = mysqli_fetch_assoc($listOfpatientsWithDiet)) { ?>
        <form class="editDietForm">
            <input type="hidden" name="id" value="<?php echo $data['patient_id'] ?>">
            <input type="hidden" name="patient_name" value="<?php echo $data['first_name'] . " " . $data['last_name'] ?>">
            <p><?php echo $data['patient_id'] ?></p>
            <p><?php echo $data['first_name'] . " " . $data['last_name'] ?></p>
            <button type="submit" class="view button button1" style="color: black;">Edit Diet</button>
            <button type="button" class="view button button1" style="color: black;" value="<?php echo $data['patient_diets_id'] ?>">View Diet</button>
            <button type="button" class="delete button button3" style="color: black;" value="<?php echo $data['patient_diets_id'] ?>">Delete Diet</button>
        </form>
        <?php } ?>
    </div>

    <!-- Add diet modal -->

    <div id="addDietModal" class="modal">
    <div class="modal-content">
        <form id="addDietForm">
            <div class="modal-content-child">
                <h3>Add Diet</h3>
                <span class="close">&times;</span>
            </div>
    </div>
    </div>

    <!-- Edit diet modal -->

    <div id="editDietModal" class="modal">
    <div class="modal-content">
        <div class="modal-container">
            <div class="modal-content-child">
                <h3>Edit Diet</h3>
                <span class="close">&times;</span>
            </div>
        </div>
    </div>
    </div>

    <!-- View diet modal -->

    <div id="viewDietModal" class="modal">
    <div class="modal-content">
        <div class="modal-container">
            <div class="modal-content-child">
                <h3>View Diet</h3>
                <span class="close">&times;</span>
            </div>
        </div>
    </div>
    </div>

<style>

.modal {
  display: none; 
  position: fixed; 
  z-index: 1; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgba(0,0,0,0.4); 
}

.modal-content {
  display: flex;
  min-height: 40vh;
  min-width: 40vw;
  max-width: 60vw;
  background-color: white;
  margin: 10% auto; 
}

.modal-content form {
    width: 100%;
    padding: 2rem;
}

.modal-container {

    width: 100%;
    padding: 2rem;

}

.modal-content-child {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>

<script>
    

    const addDietModal = document.getElementById("addDietModal");

    const editDietModal = document.getElementById("editDietModal");

    const viewDietModal = document.getElementById("viewDietModal");

    const addDiet = document.querySelectorAll(".addDiet");

    const spans = document.querySelectorAll(".close");

    const editDietForm = document.querySelectorAll('.editDietForm');

    const viewBtn = document.querySelectorAll('.view');

    viewBtn.forEach(button => {
        button.addEventListener('click', e => {
            viewDietModal.style.display = "block";
        })
    })

    editDietForm.forEach(editForm => {
        editForm.addEventListener('submit', e => {
            e.preventDefault();
            editDietModal.style.display = "block";
        })
    })

    addDiet.forEach(addForm => {
        addForm.addEventListener('submit', e => {
            e.preventDefault();
            addDietModal.style.display = "block";
        })
    })



     // When the user clicks on <span> (x), close the modal
    spans.forEach(span => {
        span.onclick = function() {
            addDietModal.style.display = "none";
            viewDietModal.style.display = "none";
            editDietModal.style.display = "none";
        }
    })

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == addDietModal || event.target == viewDietModal || event.target == editDietModal) {
        addDietModal.style.display = "none";
        viewDietModal.style.display = "none";
        editDietModal.style.display = "none";
        }
    }

    window.onkeydown = function(e) {

        if(e.key == "Escape") {
            addDietModal.style.display = "none";
            viewDietModal.style.display = "none";
            editDietModal.style.display = "none";
        }
    }
</script>




    <hr>

    <!-- ======= Footer ======= -->
     <footer>
      <div class="container">
        <p align="center"><br>©2023 AlegarioCure Hospital | All Rights Reserved</p>
      </div>
    </footer>
    
     <!-- <script>
    
     // Show the pop-up message
  document.addEventListener("DOMContentLoaded", function() {
    alert("Welcome to Patient Dashboard😉✔");
  });
     </script> -->
    
  
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