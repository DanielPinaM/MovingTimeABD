
<?php require_once ("../includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Moving Time</title>
</head>

<body>
  <?php require("../includes/header.php")?>


	<?php
  if(isset($_SESSION['login']) && isset($_SESSION['name'])){
      $name = $_SESSION['name'];
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();

      $sql = sprintf("SELECT * FROM follow WHERE userName = '$name' ORDER BY companyName");
      $res = $conn->query($sql);

      while($followsList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
        echo  '<div class="row">';
          echo '<div class= "card">';
            echo ' <h3 class="bubble"> '. $followsList["companyName"] .'</h3>';
          echo'</div>';
        echo'</div>';
      }
    }
    else{
      echo  '<div class="row">';
      echo '<h2>Please login to check out the companies you follow.</h2>';
      echo'</div>';
    }

    ?>

	</div>

</body>
