<!DOCTYPE html>
<?php require_once ("../includes/config.php"); ?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>

	<?php require("../includes/header.php")?>

	<?php  //GET USER INFO
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

	<?php
		

	?>

  <!-- HTML -->
	<div class="row">
		<div class="card">
			<form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p>Name: <input class="form" type="text" name="nombre" value="<?php echo $name ?>"</p>
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
