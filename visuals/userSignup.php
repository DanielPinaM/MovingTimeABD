<!DOCTYPE html>
<?php require_once ("../includes/config.php"); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<title>Moving Time</title>
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
            echo "Looks like the passwords are not the same.";
          }
          else{ //GOOD PART
            // Checking for empty fields
            if (empty($name) || empty($phone) || empty($location) || empty($password)) {
              echo "Please fill every field";
            }
            else{
              //Recibimos la lista de los elementos que tenemos en la base de datos
              //Getting user from DB
              $app = Aplicacion::getSingleton();
              $conn = $app->conexionBd();
              //Searching by name
              $sql = sprintf("SELECT * FROM user WHERE name = '$name' ORDER BY name");
              $res = $conn->query($sql);
              $user = mysqli_fetch_assoc($res);
              //Si la consulta fuese tan correcta
              if (empty($user)){
                //DAO Create element
                $query="INSERT INTO user (name, password, phone, location, image) VALUES('$name' ,'$password', '$phone', '$location', 'user.jpg')";
                $rs = $conn->query($query);

                if(!$rs){
                  echo "<br>".$conn->error."<br>";
                }
                else{
                  $_SESSION['userId'] =$name;
                  $_SESSION['login'] = true;
                  $_SESSION['name'] = $name;
                  header( "Location: ../index.php" );
                }
              }  else { echo "Oops sorry! Looks like that username is already taken."; }
            }
          }
        } //IF CREATE ELEMENT

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
