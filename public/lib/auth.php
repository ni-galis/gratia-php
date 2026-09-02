<?php 
session_start();
require_once "./../db.php";

// Забираем данные "как есть", убирая только случайные пробелы по краям
$login = isset($_POST['login']) ? trim($_POST['login']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Валидация длины
if (mb_strlen($login) <= 2) {
    echo "login error";
    exit;
}

if (mb_strlen($password) <= 2) {
    echo "password error";
    exit;
}

// Запрос к БД через подготовленные выражения (защита от SQL-инъекций)
$sql = 'SELECT * FROM users WHERE login = :login';
$stmt = $pdo->prepare($sql);
$stmt->execute(['login' => $login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Проверка существования пользователя
if (empty($user)) {
    echo "Такого пользователя не существует";
    // Исправлено: "url=" вместо "ur2="
    echo '<meta http-equiv="refresh" content="1;url=/reg-auth.php">';
    exit();
}

// Проверка пароля (оригинальный пароль сравнивается с хэшем из БД)
if (!password_verify($password, $user['password'])) {
    echo "Неверный пароль";
    exit;
} else {
    // ЗАЩИТА: Записываем ID пользователя в сессию на сервере.
    // Подделать такую сессию на стороне клиента невозможно.
// ЗАЩИТА: Записываем ID пользователя в сессию на сервере.
$_SESSION['user_id'] = $user['id'];
$_SESSION['login'] = $user['login'];

// ИСПРАВЛЕНО: Добавлены флаги безопасности для куки
setcookie('login', $user['login'], [
    'expires' => time() + 3600 * 24 * 30,
    'path' => '/',
    'secure' => true,      // Куки передается только по HTTPS
    'httponly' => true,    // Защита от кражи куки через JavaScript (XSS)
    'samesite' => 'Lax'    // Защита от CSRF-атак
]);


    echo "Авторизация успешна!";

    echo '<meta http-equiv="refresh" content="1;url=/user.php">'; 
    exit();
}
?>
