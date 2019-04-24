
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

			if(isset($_POST['follow'])){
				$companyToFollow = $_POST['follow'];
				if(isset($_SESSION['login']) && isset($_SESSION['name'])){
						$name = $_SESSION['name'];
						$query="INSERT INTO follow(companyName, userName) VALUES('$companyToFollow' ,'$name')";
						$rs = $conn->query($query);
					}
			}

			if(isset($_POST['contract'])){
				$companyToContract = $_POST['contract'];
				if(isset($_SESSION['login']) && isset($_SESSION['name'])){
						$name = $_SESSION['name'];
						$contractDate = $_POST['date'];

						$sql = sprintf("SELECT price FROM company WHERE name = '$companyToContract'");
			      $res = $conn->query($sql);
						$contractPrice =  mysqli_fetch_array($res);
						$contractPrice = $contractPrice[0];

						$query = "INSERT INTO contract (companyName, userName, date, price) VALUES('$companyToContract' ,'$name', '$contractDate', '$contractPrice')";
						$rs = $conn->query($query);
						if($rs == true){ echo "<script>alert('Contract created')</script>"; }
					}
			}

      $sql = sprintf("SELECT * FROM company ORDER BY name");
      $res = $conn->query($sql);

			echo  '<div class="row">';
      while($companiesList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
        $companyName = $companiesList["name"];

          echo '<div class= "card">';
            echo '<img src= "/MovingTimeABD/img/'.$companiesList["image"].'" style="width:180px"></img>';
            echo ' <h3>'. $companiesList["name"] .'</h3>';
            echo '<p class="bubble">'. $companiesList["phone"] .'</p>';
            echo '<p class="bubble">'. $companiesList["location"] .'</p>';
            echo '<p class="bubble">'. $companiesList["price"] .' €</p>';
						if(isset($_SESSION['login']) && isset($_SESSION['name'])){
						echo '<form action="companies.php" method="post">';
            	echo '<button class="common-button" id="follow-button" type="submit" name="follow" value="'.$companyName.'">Follow</button>';
						echo '</form>';
						echo '<form action="companies.php" method="post">';
							echo '<p>Date: <input  class="form" type="date" name="date" value=""></p>';
            	echo '<button class="red-button" type="submit" name="contract" value="'.$companyName.'">Contract</button>';
						echo '</form>';
					}
          echo'</div>';
      }
			echo'</div>';

    ?>

	</div>

</body>
