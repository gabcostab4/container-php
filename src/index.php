<?php

$value = "World";

try {
	
	$db = new PDO('mysql:host=database;port=3306;dbname=mydb;charset=utf8mb4', 'myuser', 'secret');
	$databaseTest = $db->query('SELECT * FROM dockerSample')->fetchAll(PDO::FETCH_OBJ);

} catch(PDOException $e) {
	die($e);
}

?>

<html>
<body>
	<h1>Hello, <?= $value ?>!</h1>
	<?php foreach($databaseTest as $row): ?>
		<p>Hello, <?= $row->name ?></p>
	<?php endforeach; ?>
</body>
</html>