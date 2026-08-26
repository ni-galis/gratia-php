<?php require_once "./../db.php"; ?>
<?php session_start(); ?>
<?php
$sql = "SELECT * FROM admin";
$sql = $pdo->prepare($sql);
$sql->execute();
$admin = $sql->fetch(PDO::FETCH_ASSOC);
?>
<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

if (strlen($login) <= 2) {
  echo "login error";
  exit;
}

if (strlen($password) <= 2) {
  echo "password error";
  exit;
}

$sql = 'SELECT * FROM admin WHERE login = :login';
$stmt = $pdo->prepare($sql);
$stmt->execute(['login' => $login]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($admin)) {
  echo "Таких нет у нас";
    echo '<meta http-equiv="refresh" content="2;url=/login.php">';
  exit();
}

// ПРОВЕРЯЕМ ПАРОЛЬ

if (!password_verify($password, $admin['password'])) {
  echo  "Неверный пароль";
   // Перенаправление через 2 секунды средствами HTML
  echo '<meta http-equiv="refresh" content="2;url=/login.php">';
  exit;
} else {
  // УСТАНАВЛИВАЕМ КУКИ 3600с = 1час; 24часа; 30 дней;  "/" для всех страниц сайта

  //setcookie('login', $login, time() + 3600 * 24 * 30, "/");

  $_SESSION["login"] = $admin["login"];
  //header('Location: /admin.php');
    echo '<meta http-equiv="refresh" content="1;url=/admin.php">';
     echo "ЗАХОДИ";
  exit;
}

?>

