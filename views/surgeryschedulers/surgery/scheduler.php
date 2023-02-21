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
    <title>Document</title>

</head>
<body>
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
        <button type="submit" name="submit">Submit</button>
    </form>
    <br>
    <h3>Schedules</h3>
    <?php while($listOfSurgerySchedule = mysqli_fetch_assoc($listOfSurgerySchedules)) {?>
    <div>
        <form class="surgeryeditform">
            <input type="hidden" name="surgeryid" value="<?php echo $listOfSurgerySchedule['id'] ?>">
            <input type="hidden" name="patientname" value="<?php echo $listOfSurgerySchedule['patient_first_name'] . " " . $listOfSurgerySchedule['patient_last_name']?>">
            <input type="hidden" name="doctorname" value="<?php echo $listOfSurgerySchedule['doctor_first_name'] . " " . $listOfSurgerySchedule['doctor_last_name']?>">
            <p>Surgery id :<?php echo $listOfSurgerySchedule['id'] ?></p>
            <p>Patient name :<?php echo $listOfSurgerySchedule['patient_first_name'] . " " . $listOfSurgerySchedule['patient_last_name']?></p>
            <p>Doctor name: <?php echo $listOfSurgerySchedule['doctor_first_name'] . " " . $listOfSurgerySchedule['doctor_last_name']?></p>
            <p>Surgery type <?php echo $listOfSurgerySchedule['surgery_type'] ?></p>
            <p>Appoitment date: <?php echo $listOfSurgerySchedule['appointment_date'] ?></p>
            <p>Appointment time: <?php echo $listOfSurgerySchedule['appointment_time'] ?></p>
            <button type="submit" name="edit">Open Modal</button>
            <button type="button" class="delete" value="<?php echo $listOfSurgerySchedule['id'] ?>">delete</button>
        </form>
    </div>
    <?php }?>

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