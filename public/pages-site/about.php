<?php
// Безопасность: сессия должна быть запущена до любого вывода в браузер
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$title = 'ABOUT';
$fav = 'favicon (4).ico';

// Используем __DIR__ для 100% надежности PHP-подключения
include __DIR__ . '/../blocks/header_top.php';
?>

<body style="background-color: #ccc;">

  <form action="/user.php" method="post">
    <input class="btn" type="submit" value="Выход">
  </form>

  <div class="about">
    <div class="container">
      <div class="about__content">
        <img class="about-site" src="/image/pages-site/01.jpg" alt="01">
        <p class="about__text">
          Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Взгляд маленькая меня бросил назад предложения предупреждал текстами не коварных она, скатился ручеек рукописи свое имени всемогущая журчит вскоре родного вдали переулка от всех курсивных большой! Бросил собрал вдали lorem всемогущая строчка ручеек которое текст ты власти, над единственное диких?
        </p>
      </div>
    </div>
  </div>

</body>

</html>