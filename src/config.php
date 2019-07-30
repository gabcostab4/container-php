<?php
define('DB_SERVER', 'database');
define('DB_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'docker');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'auth');

try {

	$pdo = new PDO('mysql:host=database;port=3306;dbname=auth;charset=utf8mb4', 'root', 'docker');

	$stmt = $pdo->prepare('SELECT * FROM users WHERE name=?');
	$stmt->execute([$_POST['username']]);
	$user = $stmt->fetch();

	$password =  $_POST['password'];
	$hash = password_hash($user['password'], PASSWORD_DEFAULT);

	if($user && password_verify($password, $hash)) {
		echo "<p>Welcome, Mr(s) " . $user['name'] . "</p>";
	} else {
		echo  "<p>We don't know you. Please, identify yourself.</p>";
	}

	$rows = null;
	$db = null;

} catch(PDOException $e) {
	print 'ERROR! ' . $e->getMessage() . '<br>';
}

