<?php if(!isset($_SESSION['login'])) $_SESSION['login']=false ?>
<div>
	<ul class="nav_bar">
		<li><a class="button" href="index.php">Home</a>
		<li><a class="button" href="">Moving companies</a>
		<li><a class="button" href="">Comments</a>
		<li><a class="button" href="">Contracs</a>
		<li><a class="button" href="">Following</a>
		<!--<?php
			if(!$_SESSION['login'])
				echo '<li style="float:right"><a id="inicio_sesion" class="button" href="login.php">Inicia sesión</a>';
			else{
				echo '<li style="float:right"><a id="inicio_sesion" class="button" href="logout.php">Cerrar sesión</a>';
				if(isset($_SESSION['id_usuario']))
					echo '<li style="float:right"><a id="inicio_sesion" class="button" href="perfUser.php">Perfil</a>';
				else
					echo '<li style="float:right"><a id="inicio_sesion" class="button" href="perfEmp.php">Perfil</a>';
			}
		?> -->
	</ul>
</div>
