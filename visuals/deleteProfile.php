<!DOCTYPE html>
<?php require_once ("../includes/config.php"); ?>
<?php
  if(isset($_SESSION['login']) && isset($_SESSION['name'])){
      $name = $_SESSION['name'];
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();

      $sql = sprintf("DELETE FROM user WHERE name = '$name'");
      $res = $conn->query($sql);
    }

    session_unset();
    session_destroy();

 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<title>Moving Time</title>
</head>
<body>
	<div class="container">
		<?php require("../includes/header.php")?>

		<div class="row">
      <div class="title">
        Moving time
      </div>
    </div>

    <div class="row">
      <div class="card">
         <h3> We are sorry you left us. Please come back soon. </h3>
      </div>
    </div>


</body>
</html>
