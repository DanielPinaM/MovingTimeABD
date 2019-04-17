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

      <?php
      if(isset($_SESSION['login'])){
        if($_SESSION['login']){
          if (isset($_SESSION['userName'])) {
            $id = $_SESSION['userName'];
          }
          echo "Welcome!" . $_SESSION['userName'];
        }
      }
      ?>
    </div>

    <div class="row">
      <?php if (isset($_SESSION['login'])) {
        if(!$_SESSION['login']){
          echo "<div><a class=\"common-button\" id=\"signup-button\" href=\"userSignup.php\">Signup</a></div>";
        }
      } ?>
    </div>

    <div class="row">
  				<form class="form-card" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Login:</h2>
  				  <p>Name: <input  class="form" type="name" name="name" value=""></p>
  				  <p>Password: <input  class="form" type="password" name="password" value=""></p>
  				  <input class="common-button" type="submit" name="submit" value="Submit">
  		  	</form>
    </div>
  </div>

</body>
</html>
