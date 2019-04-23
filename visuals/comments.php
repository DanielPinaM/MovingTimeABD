
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

  <div class="row">
    <a class="common-button" href="createComment.php"> Create a comment </a>
  </div>

	<?php
  if(isset($_SESSION['login']) && isset($_SESSION['name'])){
      $name = $_SESSION['name'];
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();

      $sql = sprintf("SELECT * FROM comment WHERE userName = '$name' ORDER BY title");
      $res = $conn->query($sql);

      while($commentsList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
        $title = $commentsList["title"];
        echo  '<div class="row">';
          echo '<div class= "card">';
            echo ' <h3 class="bubble"> '. $commentsList["title"] .'</h3>';
            echo ' <p class="bubble"> '. $commentsList["content"] .'</p>';
            echo '<input class="red-button" type="submit" name="deleteComment" value="Delete" />';
            if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deleteComment'])) { //TODO
              echo $title;
              $sql = sprintf("DELETE FROM comment WHERE title = '$title'");
              $res = $conn->query($sql); }
          echo'</div>';
        echo'</div>';
      }
    }
    else{
      echo  '<div class="row">';
      echo '<h2>Please login to check out your moving contracts.</h2>';
      echo'</div>';
    }

    ?>

	</div>

</body>
