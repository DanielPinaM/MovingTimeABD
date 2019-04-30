
use MongoDB\BSON\ObjectId;
<?php require_once ("../includes/mongoConexion.php");
session_start(); ?>

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
      /*$app = Aplicacion::getSingleton();
      $conn = $app->conexionBd();*/
			$db = conectar();

			echo '<div class="row">';
		    echo '<a class="common-button" href="createComment.php"> Create a comment </a>';
		  echo '</div>';

			if(isset($_POST['delete'])){
				$commentToDelete = $_POST['delete'];
				$table = $db->commentsDB->comments;
				$table->deleteOne(["_id"=>new MongoDB\BSON\ObjectId("$commentToDelete")]);
			}

      /*$sql = sprintf("SELECT * FROM comment WHERE userName = '$name' ORDER BY title");
      $res = $conn->query($sql);*/
			$commentList = $db->commentsDB->comments;
			$value = $commentList->find();

      foreach($value as $document){  /* Follows will be created and deleted from the companies list*/
        echo  '<div class="row">';
          echo '<div class= "card">';
						echo '<p> '.$document["name"].'</p>';
            echo ' <h3 class="bubble"> '. $document["title"] .'</h3>';
            echo ' <p class="bubble"> '. $document["content"] .'</p>';
						$mongoId = $document["_id"];
						if($document["name"] == $name){
							echo '<form action="comments.php" method="post">';
	            	echo '<button class="red-button" type="submit" name="delete" value="'.$mongoId.'">Delete</button>';
							echo '</form>';
						}
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
