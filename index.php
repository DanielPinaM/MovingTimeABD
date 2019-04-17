<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/common.css">
<meta charset="utf-8">
<head>
  <title>Moving time</title>
</head>

<body>
  <div class="container">
    <?php require("includes/common/header.php")?>
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
          echo "<div class=\"column\"><a href=\"userSignup.php\" >User Signup</a></div>";
        }
      } ?>
    </div>

    <h2>Login:</h2>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				  <p>Name: <input type="name" name="name" value=""></p>
				  <p>Password: <input type="password" name="password" value=""></p>
				  <input type="submit" name="submit" value="Submit">
		  		</form>
  </div>

</body>
</html>
