<?php
// Настройки безопасности сессий
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1); // Включите при наличии HTTPS
ini_set('session.cookie_samesite', 'Lax');

session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="styles.scss">
  <title>ЛИЧНЫЙ КАБИНЕТ</title>
</head>

<body style="background: linear-gradient(90deg, #eb5757, #000000); height:100vh; font-family: sans-serif;">

  <h3 style="color:chartreuse; text-align: center; padding-top:80px; font-size:50px">ЛИЧНЫЙ КАБИНЕТ</h3>

  <div style="font-size: 35px; color:cyan; text-align: center; padding-top:20px;">

    <?php if (!empty($_SESSION['login'])) : ?>

      <!-- ПОКАЗЫВАЕМ УВЕДОМЛЕНИЕ ИЗ СЕССИИ (ЕСЛИ ОНО ЕСТЬ) -->
      <?php if (!empty($_SESSION['flash_message'])): ?>
        <p style="color: gold; font-size: 24px;"><?php echo $_SESSION['flash_message']; ?></p>
        <?php unset($_SESSION['flash_message']); // Сразу удаляем, чтобы не показывать при обновлении 
        ?>
      <?php endif; ?>

      <div style="font-size:35px; color:cyan">
        <!-- Безопасный вывод логина с защитой от XSS (через htmlspecialchars) -->
        Вы находитесь в личном кабинете, дражайший <i><?php echo mb_strtoupper(htmlspecialchars($_SESSION["login"], ENT_QUOTES, 'UTF-8')); ?></i>

        <!-- Исправлен путь к выходу (обычно лежит в корне сайта) -->
        <br><br><a href="/logout.php" style="color:gold">Выйти</a><br><br>

        <a href="/pages-site/about.php" style="color:aqua">About</a> |
        <a href="/pages-site/menu.php" style="color:aqua">Menu</a> |
        <a href="/pages-site/gallery.php" style="color:aqua">Gallery</a> |
        <a href="/pages-site/contact.php" style="color:aqua">Contact</a> |
      </div>

    <?php else: ?>

      <!-- ДЛЯ ГОСТЕЙ: Закрываем доступ к контенту сайта -->
      <h3 style="color: #f02b2bff;">НИ-НИ, НЕЛЬЗЯЯЯЯ</h3>
      <p style="font-size: 20px; color: #fff;">Для доступа необходимо войти в аккаунт</p>

      <div style="display: flex; justify-content: center; gap: 40px; margin-top: 30px;">
        <!-- Переделываем кнопки в обычные ссылки-кнопки (так правильнее, чем пустые формы методом POST) -->
        <a href="/reg.php" style="padding: 10px 20px; background: chartreuse; color: black; text-decoration: none; border-radius: 5px; font-size: 20px;">Регистрация</a>
        <a href="/auth.php" style="padding: 10px 20px; background: cyan; color: black; text-decoration: none; border-radius: 5px; font-size: 20px;">Авторизация</a>
      </div>

      <br>
      <input style=" width: 600px;
            padding-left: 5px;   padding-right: 5px;" class="inp" type="text" placeholder="для авторизации: fily,dor,aris,frosy;(пар:111)">
      <br><br><a href="/logout.php" style="color: #f3db07ff;">Выйти</a><br><br>
      <?php
      // Полностью останавливаем выполнение скрипта, чтобы никто не смог прочитать код ниже
      exit();
 
      ?>

    <?php endif; ?>

  </div>
</body>

</html>
