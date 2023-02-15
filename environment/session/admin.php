<?php

    session_start();
    
    if($_SESSION['status'] != 'admin') {
        echo "<script>
        alert('You are not allowed to view this page'); 
        window.history.back();
        </script>";
    }

?>