<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles.css">
  <title><?= $title ?? 'Главная страница' ?></title>
  <!-- Исправлено: добавлен закрывающий тег ?> и защита от пустой переменной -->
  <link rel="shortcut icon" href="/img/favicon/<?= $fav ?? 'favicon.ico' ?>" type="image/x-icon">
  <link rel="stylesheet" href="/scss/css/style.css">