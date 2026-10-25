<?php 
session_start(); 
require_once "./../db.php"; 

// Защита: если сессия пустая, не даем выполнять скрипт
if (empty($_SESSION['login'])) {
    exit("Доступ запрещен");
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработка NAV</title>
</head>
<body style="background: linear-gradient(350deg, #be5869, #403a3e); height:100vh; color: #fff; font-family: sans-serif; padding: 20px;">

<?php
// Код выполняется ТОЛЬКО если была нажата кнопка "Сохранить"
if (isset($_POST['save'])) {

    // 1. Фильтрация и валидация текстовых полей
    $logo = trim(filter_var($_POST['logo'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
    $about = trim(filter_var($_POST['about'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
    $menu = trim(filter_var($_POST['menu'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
    $gallery = trim(filter_var($_POST['gallery'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));
    $contact = trim(filter_var($_POST['contact'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS));

    if (strlen($logo) <= 2 || strlen($about) <= 2 || strlen($menu) <= 2 || strlen($gallery) <= 2 || strlen($contact) <= 2) {
        echo "<h3>Ошибка: Все текстовые поля должны быть длиннее 2 символов!</h3>";
        echo '<meta http-equiv="refresh" content="3;url=/admin_pages/nav.php">';
        exit;
    }

    // 2. Обработка загрузки файла (если он выбран)
    //$filename = null; // По умолчанию имя фала пустое (если картинку не меняли)

    if (!empty($_FILES['im']['name'])) {
        // Проверка расширения по черному списку
        $list = ['.html', '.js', '.txt', '.php'];
        $ext = strtolower(pathinfo($_FILES["im"]["name"], PATHINFO_EXTENSION));
        
        foreach ($list as $item) {
            if (preg_match("/" . preg_quote($item) . "$/", strtolower($_FILES["im"]["name"]))) {
                exit("<h3>Ошибка: Расширение файла не подходит!</h3>");
            }
        }

        // Проверяем тип через getimagesize
        $type = @getimagesize($_FILES["im"]["tmp_name"]);
        if ($type) {
            $allowed_types = ['image/png', 'image/jpg', 'image/jpeg'];
            // Исправленная проверка типа: файл должен входить в массив разрешенных
            if (!in_array($type['mime'], $allowed_types)) {
                exit("<h3>Ошибка: Тип файла не подходит (разрешены только JPG, JPEG, PNG)!</h3>");
            }
        } else {
            exit("<h3>Ошибка: Файл не является изображением!</h3>");
        }

        // Исправлено: проверяем размер файла через ['size'], а не ['name']
        if ($_FILES['im']['size'] > 1024 * 1000) {
            exit("<h3>Ошибка: Размер файла превышает 1 МБ!</h3>");
        }

        // Путь для сохранения (убедитесь, что папка ../img/ существует)
        $upload = "../img/" . $_FILES["im"]["name"];

        if (move_uploaded_file($_FILES['im']['tmp_name'], $upload)) {
            echo "<p>Файл успешно загружен.</p>";
            $filename = $_FILES["im"]["name"]; // Запоминаем имя файла для БД
        } else {
            echo "<p style='color:red;'>Ошибка при перемещении файла на сервере.</p>";
        }
    }

    // 3. Сохранение данных в базу данных (PDO)
    // Если картинка загружалась — обновляем и поле filename, если нет — оставляем старое изображение
    if ($filename !== null) {
        $sql_text = "UPDATE nav SET logo=:logo, about=:about, menu=:menu, gallery=:gallery, contact=:contact, filename=:filename";
        $params = [
            'logo' => $logo,
            'about' => $about,
            'menu' => $menu,
            'gallery' => $gallery,
            'contact' => $contact,
            'filename' => $filename
        ];
    } else {
        $sql_text = "UPDATE nav SET logo=:logo, about=:about, menu=:menu, gallery=:gallery, contact=:contact";
        $params = [
            'logo' => $logo,
            'about' => $about,
            'menu' => $menu,
            'gallery' => $gallery,
            'contact' => $contact
        ];
    }

    // Подготовка и выполнение запроса (то, чего не хватало)
    $stmt = $pdo->prepare($sql_text);
    if ($stmt->execute($params)) {
        echo "<h3>Данные успешно сохранены в базе!</h3>";
    } else {
        echo "<h3>Ошибка при сохранении в базу данных!</h3>";
    }

    // Перенаправление обратно на страницу редактирования через 2 секунды
    echo '<p>Перенаправление обратно...</p>';
    echo '<meta http-equiv="refresh" content="2;url=/admin_pages/nav.php">';
    exit();
} else {
    // Если зашли на страницу напрямую, а не через форму
    echo "<h3>Перенаправление...</h3>";
    echo '<meta http-equiv="refresh" content="5;url=/admin_pages/nav.php">';
}
?>

</body>
</html>
