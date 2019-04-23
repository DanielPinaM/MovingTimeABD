
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
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();

      $sql = sprintf("SELECT * FROM company ORDER BY name");
      $res = $conn->query($sql);

      echo  '<div class="row">';
      while($companiesList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
        //$companyname = $companiesList["name"];

          echo '<div class= "card">';
            echo '<img src= "/MovingTimeABD/img/'.$companiesList["image"].'" style="width:180px"></img>';
            echo ' <h3>'. $companiesList["name"] .'</h3>';
            echo '<p class="bubble">'. $companiesList["phone"] .'</p>';
            echo '<p class="bubble">'. $companiesList["location"] .'</p>';
            echo '<p class="bubble">'. $companiesList["price"] .' €</p>';
            //echo '<button class"common-button" onclick=follow('.$companyName.')>Contract</button>'
          echo'</div>';

      }
      echo'</div>';

    ?>

	</div>

</body>
