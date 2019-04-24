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
          $title = test_input($_POST["title"]);
          $content = test_input($_POST["content"]);
          $name = $_SESSION['name'];
          //GOOD PART
            // Checking for empty fields
            if (empty($title) || empty($content)) {
              echo "Please fill every field";
            }
            else{
              //Getting user from DB
              $app = Aplicacion::getSingleton();
              $conn = $app->conexionBd();

              //Searching by name
              $sql = sprintf("SELECT * FROM comments WHERE name = '$name' AND title = '$title'");
              $res = $conn->query($sql);
              //Si la consulta fuese tan correcta
              if (empty($res)){
                //DAO Create element
                $query="INSERT INTO comment (userName, title, content) VALUES('$name' ,'$title', '$content')";
                $rs = $conn->query($query);

                if(!$rs){
                  echo "<br>".$conn->error."<br>";
                }
                else{
                  header( "Location: comments.php" );
                }
              }  else { echo "Oops sorry! Looks like that title is already taken."; }
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
          <h2>Contract this company:</h2>
					<p>Date: <input  class="form" type="date" name="date" value=""></p>
					<p>Content: <input  class="form" id="content" type="text" name="content" value=""></p>
				  <input class="common-button" type="submit" name="submit" value="Submit">
		  		</form>
			</div>
		</div>
</body>
</html>
