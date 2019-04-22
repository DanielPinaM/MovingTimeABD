<!DOCTYPE html>
<?php
require_once ("../includes/config.php");

	session_unset();
	session_destroy();
 ?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
	<title>Moving Time</title>
</head>
<body>
	<div class="container">
		<?php require("../includes/header.php")?>

		<div class="row">
      <div class="title">
        Moving time
      </div>
    </div>

		<div class="row">
			<h2 class="bubble">We will miss you. Come back later!</h2>
		</div>

</body>
</html>
