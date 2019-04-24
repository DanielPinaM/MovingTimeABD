
<?php require_once ("../includes/config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Moving Time</title>
</head>

<body>
  <?php require("../includes/header.php");

  if(isset($_SESSION['login']) && isset($_SESSION['name'])){
      $name = $_SESSION['name'];
      $app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();

			echo '<div class="row">';
		    echo '<a class="common-button" href="createComment.php"> Create a comment </a>';
		  echo '</div>';

			if(isset($_POST['delete'])){
				$commentToDelete = $_POST['delete'];
				$sql = sprintf("DELETE FROM comment WHERE title = '$commentToDelete'");
	      $res = $conn->query($sql);
			}

      $sql = sprintf("SELECT * FROM comment WHERE userName = '$name' ORDER BY title");
      $res = $conn->query($sql);

      while($commentsList =  mysqli_fetch_assoc($res)){  /* Follows will be created and deleted from the companies list*/
        $commentTitle = $commentsList["title"];
        echo  '<div class="row">';
          echo '<div class= "card">';
            echo ' <h3 class="bubble"> '. $commentsList["title"] .'</h3>';
            echo ' <p class="bubble"> '. $commentsList["content"] .'</p>';
						echo '<form action="comments.php" method="post">';
            	echo '<button class="red-button" type="submit" name="delete" value="'.$commentTitle.'">Delete</button>';
						echo '</form>';
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
