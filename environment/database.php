<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'core2hospital';

  $connection = mysqli_connect($host, $user, $password, $database);

  if(mysqli_connect_error()){
    echo "Error Connection";
  }

 ?>