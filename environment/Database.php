<?php

  class Database {

    public static function connect() {

      $conn = mysqli_connect('localhost', 'root', '', 'core2hospital');

      return $conn;

    }

  }

 ?>