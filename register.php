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
	
	<h1>Registration</h1>
	<?php 
		// Флаг регистрации
		$isRegistered = false;
		if (isset($_POST['post'])) {
			$res = $db_pdo->prepare("INSERT INTO users (LOGIN, PASSWORD) VALUES (:login, :password)");
			$res->bindParam(':login', $_POST['login']);
			$res->bindParam(':password', $_POST['password']);
			$res->execute();
			$isRegistered = $res ? true : false;
		}
	?>
	<?php if($isRegistered): ?>
		<h1>You are succesfully register!</h1>
	<?php endif; ?>
	<?php  if (!isset($_SESSION['login']) || $isRegistered): ?> <!-- Если не авторизирован то показывать -->
		<form method="post">
			<input type="text" name="login"><br>
			<input type="password" name="password"><br>
			<input type="submit" name="post">
		</form>
	<?php endif; ?>
</body>
</html>