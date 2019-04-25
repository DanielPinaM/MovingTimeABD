<?php
require "../vendor/autoload.php";
    function conectar(){
      $conexion = new MongoDB\Client("mongodb://localhost:27017");
      return $conexion;
    }
    ?>
