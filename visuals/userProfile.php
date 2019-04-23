<!DOCTYPE html>
<?php require_once ("../includes/config.php"); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Moving Time</title>
</head>

<body>

	<?php require("../includes/header.php")?>

	<?php 		//ACCESSING USER INFO
		if(isset($_SESSION['login']) && isset($_SESSION['name'])){
				$name = $_SESSION['name'];
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $sql = sprintf("SELECT * FROM user WHERE name = '$name' ORDER BY name");
        $res = $conn->query($sql);
        if ($res){
           $user = mysqli_fetch_assoc($res);
           $phone = $user["phone"];
           $location = $user["location"];
           $image = $user["image"];
        }
        else { echo"Can't find your user profile"; }
		}

	?>

  <!-- HTML -->
	<div class="row">
		<div class="card">
			<?php
			echo '<img src= "/MovingTimeABD/img/'.$image.'" style="width:280px"></a>';
      echo '<div class="littleObjects">';
			echo '<p class ="bubble"> '.$name.'</p>';
			echo '<p class ="bubble"> '.$phone.'</p>';
			echo '<p class ="bubble"> '.$location.'</p>';
      echo '</div>';
			?>
		</div>

    <div class="div-button">
				<?php
					if($_SESSION['login'])
						echo '<a class ="common-button" href="updateProfile.php" >Update my profile</a>';
					?>
		    </div>
		<div class="div-button">
				<?php
					if($_SESSION['login'])
						echo '<a class ="red-button" href="deleteProfile.php" >Delete me (warning)</a>';
				?>
    </div>
	</div>

</body>
</html>
