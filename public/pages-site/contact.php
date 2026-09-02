<?php
// Безопасность: сессия должна быть запущена до любого вывода в браузер
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$title = 'CONTACT';
$fav = 'favicon (5).ico';

// Используем __DIR__ для 100% надежности PHP-подключения
include __DIR__ . '/../blocks/header_top.php';
?>

<body style="background-color: #ccc;">

  <form action="/user.php" method="post">
    <input class="btn" type="submit" value="Выйти">
  </form>
  
  <div>
    <div class="contact">
      <div class="container">
        <div class="contact__content">
          <img class="contact-site" src="/image/pages-site/03.jpg" alt="03">
          <p class="contact__text">
            Далеко-далеко за словесными горами в стране гласных и согласных живут рыбные тексты. Взгляд маленькая меня бросил назад предложения предупреждал текстами не коварных она, скатился ручеек рукописи свое имени всемогущая журчит вскоре родного вдали переулка от всех курсивных большой! Бросил собрал вдали lorem всемогущая строчка ручеек которое текст ты власти, над единственное диких?
          </p>

        </div>
      </div>
    </div>
  </div>

</body>

</html>