<?php

    session_start();
    
    if($_SESSION['status'] != 'nutritionists') {
        echo "<script>
        alert('You are not allowed to view this page'); 
        window.history.back();
        </script>";
    }

?>