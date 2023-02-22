<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/session/surgery_scheduler.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/Users/SurgerySchedulerController.php';

    $query = new SurgerySchedulerQuery;

    $listOfDoctors = $query->all('doctors');

    $listOfSurgery = $query->all('surgery_list');
    $listOfModalSugery = $query->all('surgery_list');

    $listOfSurgerySchedules = $query->listOfSortedSurgerySchedules();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Surgery Scheduler</title>
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
        padding: 10px 23px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 13px;
        margin: 4px 2px;
        cursor: pointer;
        transition: transform .2s;
      }
	  
	  
	  .button11
	  {
	    background-color: #4CAF50;
	    width: 100px;
		height: 45px;
	  } /* Green */	  
      
      .button1 
	  {
	    background-color: #4CAF50;
	    width: 100px;
		height: 45px;
		font-size: 10px;
	
	  } /* Green */
	  
      .button2 
	  {
	    background-color: #008CBA;
	    width: 100px;
		height: 45px;
	  } /* Blue */
	  
      .button3 
	  {
	    background-color: #ff6666;
	    width: 100px;
		height: 45px;
	  } /* light red*/
      
      
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
    width: 1250px;  /* Set the width of the module */
    height: 720px;  /* Set the height of the module */
    margin-left: auto;
    margin-right: auto; 
    
    }
		
	.my-hr {
  border: 2px solid black;
  font-weight: bold;
}	
		
		
      table {
		margin-left: auto;
        margin-right: auto;
        
        border-collapse: collapse;
      }
      th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
      }
      th {
        background-color: #f2f2f2;
      }                      
	  h1 {
         text-align: center;
	  }	
		
		  
  
   table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
}

th {
  background-color: lightgray;
  font-weight: bold;
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
  
  
          <li class="nav-heading">Surgery Scheduler</li>
  
        
        <li class="nav-item">
          <a class="nav-link " href="outpatient/treatment.php">
            <i class="bi bi-layout-text-window-reverse"></i>
            <span>Outpatient Treatment</span>
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
  
      </ul>
  
    </aside><!-- End Sidebar-->
  
    <main id="main" class="main">
  
      <div class="pagetitle">
        <h1>Surgery Scheduler</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Surgery Scheduler</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->



<body>
	 <br>
     <div class="module">
		 <h3>Surgery Scheduler</h3><br>
    <form  action="submit_schedule.php" method="post" >
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
        <button type="submit" name="submit" class="button button11">Submit</button>
    </form>
    <br>
    <h3>Schedules</h3>	
	
	    <table style="width:1150px">
  <thead>
  
    <tr>	  
	  <tr> 
	   <div>
	   <th><p>Surgery id :</p></th>
       <th><p>Patient name :</p></th>
       <th><p>Doctor name:</p></th>
        <th><p>Surgery type:</p></th>
       <th><p>Appoitment date:</p></th>
       <th><p>Appointment time:</p><br></th>
	   <th><p>Actions</p></th>
	  </tr>
    </tr>
	
  </thead>
  <tbody style="height:90px">
	
   <?php while($listOfSurgerySchedule = mysqli_fetch_assoc($listOfSurgerySchedules)) {?>
   <form class="surgeryeditform">
    <tr>
      <td><?php echo $listOfSurgerySchedule['id'] ?></td>
      <td><?php echo $listOfSurgerySchedule['patient_first_name'] . " " . $listOfSurgerySchedule['patient_last_name']?></td>
      <td><?php echo $listOfSurgerySchedule['doctor_first_name'] . " " . $listOfSurgerySchedule['doctor_last_name']?></td>
	  <td><?php echo $listOfSurgerySchedule['surgery_type'] ?></td>
	  <td><?php echo $listOfSurgerySchedule['appointment_date'] ?></td>
	  <td><?php echo $listOfSurgerySchedule['appointment_time'] ?></td>
	  
	 <td style="background-color: #d3d3d3">&nbsp;&nbsp;
	  <button type="submit" name="edit" class="button button1" style="color:#FFFFFF">Edit</button>
    <button type="button" class="delete button button3" style="color:#FFFFFF" value="<?php echo $listOfSurgerySchedule['id'] ?>">delete</button>
	 </td>
    </tr>
	 </form>
  <?php }?>
  </div>
 </tbody>

	  
    <hr>
		 <p style="color: grey;">About: Schedules refer to the planned timetables for various activities and operations within the hospital. For patients, schedules typically involve booking appointments with physicians or other healthcare professionals, arranging diagnostic tests and procedures, and coordinating hospital admissions and discharges. These schedules are typically managed by the hospital's administrative staff or through online appointment booking systems.</p>
	</div>
	
	
	
	
	
	
	
	
	

<!-- Modal -->

    <div id="editModal" class="modal">
    <div class="modal-content">
        <form id="editSurgeryForm">
            <div class="modal-content-child">
                <h3>Edit Surgery</h3>
                <span class="close">&times;</span>
            </div>

            <input type="hidden" id="surgery_id" name="surgery_id">
            <p class="modal-values"></p>
            <p class="modal-values"></p>
            <p class="modal-values"></p>
            
            <select name="surgery_type" required>
            <option value="" selected disabled>Surgery Type</option>
                <?php while($modalSurgery = mysqli_fetch_assoc($listOfModalSugery)) {?>
                    <option value=" <?php echo $modalSurgery['surgery'] ?> "><?php echo $modalSurgery['surgery'] ?></option>
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
            <button type="submit" name="save">Save</button>
        </form>
    </div>
    </div>


<script>


    // Get the modal
    const modal = document.getElementById("editModal");

    // Get the button that opens the modal
    const forms = document.querySelectorAll(".surgeryeditform");

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[0];

    const modalSurgeryId = document.getElementById('surgery_id');

    const modalValues = document.querySelectorAll('.modal-values');

    const editSurgeryForm = document.getElementById('editSurgeryForm');

    $('.delete').click(function() {

        $.post("delete_schedule.php", {
            id : $(this).val()
        },
        function(data){
            alert(data);
        })
        window.location.reload();
    })

    // When the user clicks on the button, open the modal
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const formdata = new FormData(form);

            const surgeryid = formdata.get('surgeryid')

            modalSurgeryId.value = surgeryid;
            modalValues[0].innerHTML = `Surgery id : ${formdata.get('surgeryid')}`;
            modalValues[1].innerHTML = `Patient name : ${formdata.get('patientname')}`;
            modalValues[2].innerHTML = `Doctor name : ${formdata.get('doctorname')}`;

            editSurgeryForm.addEventListener('submit', (e1) => {
                e1.preventDefault();
                const editForm = new FormData(editSurgeryForm);

                $.post("edit_schedule.php",
                {
                    id : surgeryid,
                    surgery_type : editForm.get('surgery_type'),
                    appointment_date : editForm.get('date'),
                    appointment_time : editForm.get('time')
                },
                function(data){
                    alert(data);
                });

                modal.style.display = "none";
                window.location.reload();

            })

            modal.style.display = "block";
        })

    })

    const submitSurgery = ( (surgeryid, ) => {

    }) 

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

    window.onkeydown = function(e) {

        if(e.key == "Escape") {
            modal.style.display = "none";
        }
    }


    }


</script>

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
  height: 40vh;
  width: 30%;
  background-color: white;
  margin: 15% auto; 
}

.modal-content form {
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

</body>
</html>