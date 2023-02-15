<?php

    session_start();
    include '../environment/database.php';

    // $_POST['submit'] came from form input type submit, name = submit
    if(isset($_POST['submit'])){

        // information came from AI log in form
        $username = $_POST['email'];
        $password = $_POST['password'];

        // query for log in
        $sql = "SELECT * FROM users WHERE email = '$username' AND password = '$password'";

        // execute query, $conn parameter came from require('../php-functions/database.php');
        $sqlexecute = mysqli_query($connection, $sql);

        // fetch user information and save to $user variable
        $user = mysqli_fetch_assoc($sqlexecute);

        // save session information for user to stay authenticated
        if(!$user) {
            
            echo "<script>
                alert('You are logged out');
                window.location = '../index.php';
            </script>";

        } else {
            
            if($user['roles'] === "patient") {

                $_SESSION['status'] = 'patient';
                $user_id = $user['id'];

                $sql1 ="SELECT * FROM `patients` WHERE `user_id` = $user_id";
                $sqlexecute1 = mysqli_query($connection, $sql1);
                $patient = mysqli_fetch_assoc($sqlexecute1);

                $_SESSION['user_info'] = $patient;

                header("Location: ../views/patient");

            } else if($user['roles'] === "doctor") {

                $_SESSION['status'] = 'doctor';

                $user_id = $user['id'];

                $sql2 ="SELECT * FROM `doctors` WHERE `user_id` = $user_id";
                $sqlexecute2 = mysqli_query($connection, $sql2);
                $doctor = mysqli_fetch_assoc($sqlexecute2);

                $_SESSION['user_info'] = $doctor;
                
                header("Location: ../views/doctor");

            } else if($user['roles'] === "medtech") {

                $_SESSION['status'] = 'medtech';

                $user_id = $user['id'];

                $sql3 ="SELECT * FROM `medtechs` WHERE `user_id` = $user_id";
                $sqlexecute3 = mysqli_query($connection, $sql3);
                $medtech = mysqli_fetch_assoc($sqlexecute3);

                $_SESSION['user_info'] = $medtech;
        
                header("Location: ../views/medtech");

            } else if($user['roles'] === "hospital staff") {

                $_SESSION['status'] = 'hospital_staff';

                $user_id = $user['id'];

                $sql4 ="SELECT * FROM `hospital_staffs` WHERE `user_id` = $user_id";
                $sqlexecute4 = mysqli_query($connection, $sql4);
                $hospital_staff = mysqli_fetch_assoc($sqlexecute4);

                $_SESSION['user_info'] = $hospital_staff;
        
                header("Location: ../hospitalstaff");

            } else if($user['roles'] === "nutritionist") { 

                $_SESSION['status'] = 'nutritionist';

                $user_id = $user['id'];

                $sql5 ="SELECT * FROM `nutritionists` WHERE `user_id` = $user_id";
                $sqlexecute5 = mysqli_query($connection, $sql5);
                $nutritionist = mysqli_fetch_assoc($sqlexecute5);

                $_SESSION['user_info'] = $nutritionist;
        
                header("Location: ../views/nutritionist");

            } else if($user['roles'] === "admin") { 

                $_SESSION['status'] = 'admin';

                $user_id = $user['id'];

                $sql6 ="SELECT * FROM `admins` WHERE `user_id` = $user_id";
                $sqlexecute6 = mysqli_query($connection, $sql6);
                $admin = mysqli_fetch_assoc($sqlexecute6);

                $_SESSION['user_info'] = $admin;

                header("Location: ../views/admin");

            } else if($user['roles'] === "surgery scheduler") { 

                $_SESSION['status'] = 'surgery schedluer';

                $user_id = $user['id'];

                $sql7 ="SELECT * FROM `surgery_schedulers` WHERE `user_id` = $user_id";
                $sqlexecute7 = mysqli_query($connection, $sql7);
                $surgery_scheduler = mysqli_fetch_assoc($sqlexecute7);

                $_SESSION['user_info'] = $surgery_scheduler;

                header("Location: ../views/admin");

            }

        }


    }

?>