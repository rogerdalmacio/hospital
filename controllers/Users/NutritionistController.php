<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/QueryController.php';

    class NutritionistQuery extends Query {

        public function addFoods(string $food, string $classification) {

            $date = Query::date();
            
            $query = "INSERT INTO `list_of_foods`(`id`, `food`, `classification`, `created_at`, `updated_at`) VALUES (null,'$food','$classification','$date','$date')";
            $execute = mysqli_query(Database::connect(), $query);
            
            if($execute) {

                echo "<script>
                alert('Food successfully added'); 
                window.history.back();
                </script>";

            } else {

                echo "<script>
                alert('Something went wrong'); 
                window.history.back();
                </script>";

            }

        }

        public function deleteFood(int $id) {

            $query = "DELETE FROM `list_of_foods` WHERE id = '$id'";
            $execute = mysqli_query(Database::connect(), $query);

            if($execute) {

                echo "Deleted Successfully";
                
            } else {

                echo "Something went wrong";

            }

        }

        public function listOfFoods(string $classification) {

            $query = "SELECT * FROM list_of_foods WHERE classification = '$classification'";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

        public function patientsWithDiet() {

            $query = "SELECT patients.id as patient_id, patients.first_name, patients.last_name, patient_diets.id as patient_diets_id, patient_diets.nutritionists, patient_diets.classification, patient_diets.breakfast, patient_diets.lunch, patient_diets.dinner 
            FROM patients 
            INNER JOIN patient_diets 
            ON patients.id = patient_diets.patient_id";
            $execute = mysqli_query(Database::connect(), $query);

            return $execute;

        }

    }