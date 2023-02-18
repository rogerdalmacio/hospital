<?php 

    include '../environment/Database.php';
    include '../environment/FileRestriction.php';
    session_start();

    class AuthController extends Database{

        public function authenticate(string $email, string $password) {

            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $execute = mysqli_query(Database::connect(), $query);
            $data = mysqli_fetch_array($execute);
            
            if(!$data) {
                echo "<script>
                
                alert('No user found') 
                window.history.back()
                
                </script>";
            }
            
            return $data;

        }

        public static function user(int $id, string $roles) {

            $query = "SELECT * FROM $roles WHERE id = '$id'";
            $execute = mysqli_query(Database::connect(), $query);
            $data = mysqli_fetch_assoc($execute);
            $_SESSION['user_info'] = $data;
            $_SESSION['status'] = $roles;

            echo "<script> alert('success') </script>";
            header("location: ../views/$roles");

        }

    }