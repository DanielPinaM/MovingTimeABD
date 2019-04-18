<?php require_once ("includes/config.php"); ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="/MovingTimeABD/css/common.css">
<meta charset="utf-8">
<head>
  <title>Moving time</title>
</head>

<body>
  <div class="container">
    <?php require("includes/header.php")?>

    <div class="row">
      <div class="title">
        Moving time
      </div>
    </div>

    <div class="row">
      <?php if (isset($_SESSION['login'])) {
        if(!$_SESSION['login']){
          echo "<div><a class=\"common-button\" id=\"signup-button\" href=\"visuals/userSignup.php\">Signup</a></div>";
        }
      } ?>

      <?php
      if(isset($_SESSION['login'])){
        if($_SESSION['login']){
          if (isset($_SESSION['name'])) {
            $id = $_SESSION['name'];
          }
          echo "<h3>Welcome " . $_SESSION['name'] . "!</h3>";
        }
      }
      ?>
    </div>


      <?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = test_input($_POST["name"]);
					$password = sha1(md5(test_input($_POST["password"])));
          //$password = test_input($_POST["password"]);
              //Error checking
              if (empty($password) || empty($name)) {
                  return "Error";
              }
              //Getting user from //
              $app = Aplicacion::getSingleton();
	            $conn = $app->conexionBd();
               //Searching by name
        	     $sql = sprintf("SELECT * FROM user WHERE name = '$name' ORDER BY name");
        	     $res = $conn->query($sql);
               //Si la consulta fuese tan correcta
        	     if ($res){
        	     	  $user = mysqli_fetch_assoc($res);
        			    $userName = $user["name"];
                  $userPassword = $user["password"];//,$user["Phone"],$user["Location"], $user["image"]);
        		   }
        		   else { return ;}

               //Password checking
              if($user == null || $userPassword !== $password){
                $_SESSION['success'] = "error";
                $_SESSION['login'] = false;
                echo "Wrong username or password";
              }
              else{
                //Si el usuario es correcto se crea una variable de sesión con el id del usuario y actualizamos la variabel logeado
                $_SESSION['userId'] =$userName;
                $_SESSION['login'] = true;
                $_SESSION['name'] = $userName;
                header( "Location: index.php" );
              }
					}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
			?>

      <?php
        if(!$_SESSION['login']){
          echo"
          <div class=\"row\">
              <!-- HTML LOGIN -->
        				<form class=\"form-card\" method=\"post\" action= 'index.php'\">
                  <h2>Login:</h2>
        				  <p>Name: <input  class=\"form\" type=\"name\" name=\"name\" value=\"\"></p>
        				  <p>Password: <input  class=\"form\" type=\"password\" name=\"password\" value=\"\"></p>
        				  <input class=\"common-button\" type=\"submit\" name=\"submit\" value=\"Submit\">
        		  	</form>
          </div>";
        }

      ?>
  </div>

</body>
</html>
