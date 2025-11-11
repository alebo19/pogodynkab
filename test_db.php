<?php
$pdo = new PDO('sqlite:var/data_dev.db');

$stmt = $pdo->query('SELECT username, password, roles FROM user;');
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "Użytkownicy w bazie:\n";
print_r($rows);
