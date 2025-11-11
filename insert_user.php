<?php
$pdo = new PDO('sqlite:var/data_dev.db');

// zmień nazwę użytkownika i hash jeśli chcesz
$username = 'user';
$roles = '["ROLE_USER"]';
$hash = '$2y$13$IBy5dYg76X/imzBggpRRtegTgRq0GEVp2GZKb3gttnr3wIpyJe9hC';

$stmt = $pdo->prepare('INSERT INTO user (username, roles, password) VALUES (:username, :roles, :hash)');
$stmt->execute([
    ':username' => $username,
    ':roles'    => $roles,
    ':hash'     => $hash,
]);

echo "✅ Dodano użytkownika: $username\n";

// pokaż w bazie dla sprawdzenia
$rows = $pdo->query('SELECT id, username, roles FROM user')->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
