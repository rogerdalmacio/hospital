<?php 

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/environment/Database.php';
    session_start();

    class AuthController{

        public function authenticate(string $email, string $password) {

            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $execute = mysqli_query(Database::connect(), $query);
            $data = mysqli_fetch_array($execute);
            
            return $data;

        }

        public static function user(int $id, string $roles) {

            $query = "SELECT * FROM $roles WHERE user_id = '$id'";
            $execute = mysqli_query(Database::connect(), $query);
            $data = mysqli_fetch_assoc($execute);
            $_SESSION['user_info'] = $data;
            $_SESSION['status'] = $roles;

            echo "<script> 
                alert('success') 
                window.location.href = '../views/$roles'
            </script>";

        }

    }