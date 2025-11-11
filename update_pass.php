<?php
$pdo = new PDO('sqlite:var/data_dev.db');
$hash = '$2y$13$6igMzzEM.UFjiDt.22IUMe9K5C7reEm.wX5H3K9b3OfJfd6TH8/5e';

$stmt = $pdo->prepare('UPDATE user SET password = :hash WHERE username = "admin"');
$stmt->execute(['hash' => $hash]);

echo "✅ Hasło zostało zaktualizowane!\n";

$check = $pdo->query('SELECT username, password FROM user')->fetchAll(PDO::FETCH_ASSOC);
print_r($check);
