<?php if(!isset($_SESSION['login'])) $_SESSION['login']=false ?>
<div>
	<ul class="nav_bar">
		<li><a class="button" href="/movingtimeabd/index.php">Home</a>
		<li><a class="button" href="">Moving companies</a>
		<li><a class="button" href="">Comments</a>
		<li><a class="button" href="">Contracs</a>
		<li><a class="button" href="">Following</a>
		<?php
			if($_SESSION['login']){
				echo '<li style="float:right"><a  class="button" href="/movingtimeabd/visuals/logout.php">Logout</a>';
				echo '<li style="float:right"><a  class="button" href="/movingtimeabd/visuals/userProfile.php">Profile</a>';
			}
		?>
	</ul>
</div>
