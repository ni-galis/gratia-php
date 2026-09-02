<?php
// Безопасность: сессия должна быть запущена до любого вывода в браузер
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$title = 'BOOK';
$fav = 'favicon (10).ico';

// Используем __DIR__ для 100% надежности PHP-подключения
include __DIR__ . '/../blocks/header_top.php';
?>


<body style="background-color: #ccc;">

  <form action="/logout.php" method="post">
    <input class="btn" type="submit" value="Выйти">
  </form>

    <div class="book-table">
      <div class="container">
        <div class="book-table__content">
          <img class="book" src="/image/pages-site/05.png" alt="05">
        </div>
      </div>
    </div>

</body>

</html>