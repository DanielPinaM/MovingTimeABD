
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

			if(isset($_POST['unfollow'])){
				$companyToUnfollow = $_POST['unfollow'];
				$sql = sprintf("DELETE FROM follow WHERE userName = '$name' AND companyName = '$companyToUnfollow'");
	      $res = $conn->query($sql);
			}

      $sql = sprintf("SELECT * FROM follow WHERE userName = '$name' ORDER BY companyName");
      $res = $conn->query($sql);
			if(!empty( mysqli_fetch_array($res))){
				while($followsList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
					$companyName = $followsList["companyName"];
	        echo  '<div class="row">';
	          echo '<div class= "card">';
	            echo ' <h3 class="bubble"> '. $followsList["companyName"] .'</h3>';
							echo '<form action="follows.php" method="post">';
	            	echo '<button class="common-button" type="submit" name="unfollow" value="'.$companyName.'">Unfollow</button>';
							echo '</form>';
	          echo'</div>';
	        echo'</div>';
	      }
			}
			else{
				echo  '<div class="row">';
	      echo '<h2>Ypu do not have any follows yet.</h2>';
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
