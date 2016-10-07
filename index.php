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

	<?php
		while ($row = $resultPosts->fetch()) {
			echo "<div class='post'>";
			    echo "<h1 class='postName'>".$row['HEADER']."</h1>";
			    echo "<p class='postContent'>".$row['CONTENT']."</p>";
		    echo "</div>";
		}
	?>
	<?php  if (isset($_SESSION['login'])): ?> <!-- Если авторизирован то показывать -->
		<h1>Make post:</h1>
		<form method="post">
			<input type="text" name="header"><br>
			<input type="text" name="content"><br>
			<input type="submit" name="post">
		</form>
	<?php endif; ?>
	<?php 
		if (isset($_POST['post'])) {
			$res = $db_pdo->prepare("INSERT INTO posts (HEADER, CONTENT) VALUES (:header, :content)");
			$res->bindParam(':header', $_POST['header']);
			$res->bindParam(':content', $_POST['content']);
			$res->execute();
		}
	?>
</body>
</html>