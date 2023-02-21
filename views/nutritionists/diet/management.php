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
</head>
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
            <button type="submit" class="submit">Add Diet</button>
        </form>
        <?php } ?>
        <h3>patients with diet</h3>
        <?php while($data = mysqli_fetch_assoc($listOfpatientsWithDiet)) { ?>
        <form class="editDietForm">
            <input type="hidden" name="id" value="<?php echo $data['patient_id'] ?>">
            <input type="hidden" name="patient_name" value="<?php echo $data['first_name'] . " " . $data['last_name'] ?>">
            <p><?php echo $data['patient_id'] ?></p>
            <p><?php echo $data['first_name'] . " " . $data['last_name'] ?></p>
            <button type="submit">Edit Diet</button>
            <button type="button" class="view" value="<?php echo $data['patient_diets_id'] ?>">View Diet</button>
            <button type="button" class="delete" value="<?php echo $data['patient_diets_id'] ?>">Delete Diet</button>
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
</body>
</html>