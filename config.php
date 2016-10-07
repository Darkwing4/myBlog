<?php 
	session_start();
	$host = 'meltron';
	$db = 'db_meltron';
	$dsn = "mysql:host=$host;dbname=$db";
	$db_pdo = new PDO($dsn, 'root', '');
	$resultPosts = $db_pdo->query("SELECT * FROM posts");
?>