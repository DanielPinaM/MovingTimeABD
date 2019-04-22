<!DOCTYPE html>
<?php require_once ("../includes/config.php"); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php require("../includes/header.php")?>

	<?php  //GET CURRENT USER INFO
		if(isset($_SESSION['login']) && isset($_SESSION['name'])){
				$name = $_SESSION['name'];
        // ACCESS TO DB (SELECT)
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

	<?php 		//UPDATING USER INFO

		if ($_SERVER["REQUEST_METHOD"] == "POST") {		//Getting values from form below
			$formPassword = sha1(md5(test_input($_POST["password"])));
			$formPhone = test_input($_POST["phone"]);
			$formLocation = test_input($_POST["location"]);
			$formImage = test_input($_POST["image"]);

			//Core code
			$somethingChanged = false;
			if($formPassword == ""){
					$query="UPDATE user SET password = '".$formPassword."' WHERE name = '$name'";
					$res = $conn->query($query);
					if (!$res) { echo "Sorry, we couldn't update your password."; } else $somethingChanged = true;
			}
			if($formPhone != $phone){
					$query="UPDATE user SET phone = '".$formPhone."' WHERE name = '$name'";
					$res = $conn->query($query);
					if (!$res) { echo "Sorry, we couldn't update your phone."; } else $somethingChanged = true;
			}
			if($formLocation != $location){
					$query="UPDATE user SET location = '".$formLocation."' WHERE name = '$name'";
					$res = $conn->query($query);
					if (!$res) { echo "Sorry, we couldn't update your location."; } else $somethingChanged = true;
			}
			if($formImage != $image){
					$query="UPDATE user SET image = '".$formImage."' WHERE name = '$name'";
					$res = $conn->query($query);
					if (!$res) { echo "Sorry, we couldn't update your image."; } else $somethingChanged = true;
			}

			if($somethingChanged)
				header( "Location: userProfile.php" );
		}

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		?>

  <!-- HTML -->
	<div class="row">
		<div class="card">
			<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p>Name:</p> <p class="bubble"> <?php echo $name ?> </p>
				<p>Password: <input class="form" type="password" name="password" value=""></p>
				<p>Phone: <input class="form" type="text" name="phone" value="<?php echo $phone ?>"></p>
				<p>Location: <input class="form" type="text" name="location" value="<?php echo $location ?>"></p>
				<p>Image: <input class="form" type="text" name="image" value="<?php echo $image ?>"></p>
				<p><input class="common-button" type="submit" name="submit" value="Update"></p>
		  </form>
		</div>

	</div>

</body>
</html>
