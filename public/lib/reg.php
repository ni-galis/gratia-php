<?php
// 1. Защищаем сессионные куки на уровне настроек (до старта сессии)
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Включить, если сайт работает по HTTPS
ini_set('session.cookie_samesite', 'Lax');

session_start();
require_once "./../db.php";

// 2. Фильтрация входных данных (FILTER_SANITIZE_SPECIAL_CHARS устарел в PHP 8.1+, используем htmlspecialchars)
$username = trim(htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES, 'UTF-8'));
$login    = trim(htmlspecialchars($_POST['login'] ?? '', ENT_QUOTES, 'UTF-8'));
$password = trim($_POST['password'] ?? ''); // Пароль очищать НЕ НАДО, иначе сломаются спецсимволы (#, &, $)
$email    = trim(filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL)); // Строгая проверка email

// 3. Валидация длины и корректности
if (mb_strlen($username) <= 2) {
    echo "username error";
    exit;
}
if (mb_strlen($login) <= 2) {
    echo "login error";
    exit;
}
if (strlen($password) <= 6) { // Для пароля лучше минимум 6 символов
    echo "password error";
    exit;
}
if (!$email) {
    echo "email error";
    exit;
}

// 4. Проверка: занят ли логин (ИСПРАВЛЕНО: используем безопасную переменную $login)
$stmt = $pdo->prepare("SELECT id FROM users WHERE login = :login");
$stmt->execute(['login' => $login]);

if ($stmt->rowCount() > 0) {
    echo "Логин занят, возьмите другой";
    exit();
}

// 5. Хеширование пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 6. Запись в базу данных
$sql = 'INSERT INTO users (username, login, password, email) VALUES (:username, :login, :password, :email)';
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        'username' => $username, 
        'login'    => $login,
        'password' => $hashed_password, 
        'email'    => $email
    ]); 
} catch (PDOException $exception) {
    echo "Ошибка при добавлении нового пользователя: " . $exception->getMessage();
    exit;
}

// 7. Авторизуем пользователя СРАЗУ после регистрации (чтобы ему не нужно было вводить пароль снова)
$userId = $pdo->lastInsertId(); // Получаем ID нового пользователя
$_SESSION['user_id'] = $userId;
$_SESSION['login'] = $login;
$_SESSION['flash_message'] = "Вы успешно зарегистрированы!";

// 8. Мгновенное и безопасное перенаправление через заголовки PHP (вместо HTML мета-тега)

// Ждем 2 секунды
sleep(2);

// Перенаправляем
header("Location: /user.php");
exit();
