<?php 
	include 'header.php';
?>
<body>
	<ul>
		<li><a href="index.php">Home</a></li>
		<?php  if (!isset($_SESSION['login'])): ?> <!-- Если не авторизирован то показывать -->
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Log-In</a></li>
		<?php endif; ?>

		<?php  if (isset($_SESSION['login'])): ?> <!-- Если не авторизирован то показывать -->
			<li id="exit"><a href="logout.php">Log out</a></li>
		<?php endif; ?>
	</ul>

	<h1>Log-in</h1>
	<?php 
		if (isset($_POST['send'])) {
			$res = $db_pdo->prepare("SELECT * FROM users WHERE LOGIN=:login AND PASSWORD=:password");
			$res->execute(array('login'=>$_POST['login'], 'password'=>$_POST['password']));
			$data = $res->fetch(PDO::FETCH_ASSOC);
			if ($res) { #Все что не false - истина  
				$_SESSION['login'] = $_POST['login'];
				echo "<h1>Welcome, ".$_SESSION['login']."</h1>";
			}
		}
	?>
	<?php  if (!isset($_SESSION['login'])): ?> <!-- Если не авторизирован то показывать -->
		<form method="post">
			<input type="text" name="login"><br>
			<input type="password" name="password"><br>
			<input type="submit" name="send">
		</form>
	<?php endif; ?>

</body>
</html>