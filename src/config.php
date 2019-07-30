<?php

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
	
} catch(PDOException $e) {
	print 'ERROR! ' . $e->getMessage() . '<br>';
}

