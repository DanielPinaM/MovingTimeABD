
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
	echo  '<div class="row">';
  if(isset($_SESSION['login']) && isset($_SESSION['name'])){
      $name = $_SESSION['name'];
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();

		if(isset($_POST['delete'])){
					$companyToContract = $_POST['delete'];
					$contractDate = $_POST['contractDate'];

					$sql = sprintf("DELETE FROM contract WHERE date = '$contractDate' AND companyName = '$companyToContract'");
					$res = $conn->query($sql);
					if($res == true){ echo "<script>alert('Contract deleted')</script>"; }
				}


      $sql = sprintf("SELECT * FROM contract WHERE userName = '$name' ORDER BY date");
      $res = $conn->query($sql);
			if(!empty(mysqli_fetch_array($res))){
		      while($contractsList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
							$companyName = $contractsList["companyName"];
							$contractDate = $contractsList["date"];
		          echo '<div class= "card">';
		            echo ' <h3> '. $contractsList["companyName"].'</h3>';
								echo '<p class="bubble">'. $contractsList["date"] .'</p>';
								echo ' <p class="bubble">'. $contractsList["price"] .' €</p>';
								echo '<form action="contracts.php" method="post">';
		            	echo '<button class="red-button" type="submit" name="delete" value="'.$companyName.'">Delete</button>';
									echo '<input class="invisible" type="date" name="contractDate" value="'.$contractDate.'">';
								echo '</form>';
		          echo'</div>';
		      }
			}
			else{
				echo '<h2>You do not have any contracts yet.</h2>';
			}

		}
    else{
      echo '<h2>Please login to check out your moving contracts.</h2>';
    }
		echo'</div>';

    ?>

	</div>

</body>
