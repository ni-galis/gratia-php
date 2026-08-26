<?php
$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_STRINGIFY_FETCHES => false,
  PDO::ATTR_EMULATE_PREPARES => false
];

$db_host = 'MySQL-8.0';
$db_user = 'root';
$db_password = '';
$db_name = 'gratia-php';

try {

  $pdo = new PDO("mysql:host=$db_host; dbname=$db_name", $db_user, $db_password);
} catch (PDOException $exception) {
  echo "Error: {$exception->getMessage()}";
}
//if ($pdo)
//  echo "Подключились к БД";
//else
//  echo "Не подключены к БД";

