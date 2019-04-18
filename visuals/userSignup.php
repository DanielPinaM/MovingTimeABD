<!DOCTYPE html>
<?php require_once ("../includes/config.php"); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
  			<?php require("../includes/header.php")?>
	<div id="container">

			<div class="row">
				<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = test_input($_POST["name"]);
					$phone = test_input($_POST["phone"]);
					$location = test_input($_POST["location"]);
					$password = sha1(md5(test_input($_POST["password"])));
					$password2 = sha1(md5(test_input($_POST["password2"])));
					if($password !== $password2){
						$dir = "Error";
					}
					else{ //GOOD PART TODO
						$SA = SA_Usuario::getInstance();
						$transfer = new TransferUsuario("",$nombre,$apellido,$password, $email,"", "" ,"" ,"","","");
				 		$dir = $SA->createElement($transfer);
				 	}
				 	if($dir !== "Error"){
						header('Location: '.$dir);
				 	}
				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}

				?>
				</form>
				<form class="form-card" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <h2>Signup as a new user:</h2>
					<p>User name: <input  class="form" type="text" name="name" value=""></p>
					<p>Phone: <input  class="form" type="text" name="phone" value=""></p>
				  <p>Location: <input  class="form" type="text" name="location" value=""></p>
				  <p>Password: <input  class="form" type="password" name="password" value=""></p>
				  <p>Confirm password: <input  class="form" type="password" name= "password2" value=""></p>
				  <input class="common-button" type="submit" name="submit" value="Submit">
		  		</form>
			</div>
		</div>
</body>
</html>
