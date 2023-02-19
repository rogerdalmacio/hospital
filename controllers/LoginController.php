<?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Hospital/controllers/AuthController.php';

    // $_POST['submit'] came from form input type submit, name = submit
    if(isset($_POST['submit'])){

        // create new instance of auth controller
        $auth = new AuthController;

        $credentials = $auth->authenticate($_POST['email'], $_POST['password']);

        // fetch user data and save to session
        $roles = $auth->user($credentials['id'], $credentials['roles']);

    }

?>