<?php session_start() ?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon (11).ico" type="image/x-icon">
  <title>Административная панель</title>
</head>

<body style="background: linear-gradient(45deg, 
#8a2be2,
#0000cd, 
#228b22,
#ccff00);
 height:100vh;">

  <h3 style="color:#eeaf3bff; text-align: center; padding-top:80px;font-size:50px">АДМИНИСТРАТИВНАЯ ПАНЕЛЬ</h3>

  <div style="font-size: 35px; color:#f7a206ff; text-align: center; padding-top:20px;">

    <!--ЕСЛИ СЕССИЯ ЗАКРЫТА Т.Е. ПУСТАЯ ТО НИКТО НЕ ДОЛЖЕН ПОПАСТЬ В admin ДЕЛАЕМ ДЛЯ ЭТОГО СОКРАЩЕННУЮ ЗАПИСЬ-->

    <?php if (!empty($_SESSION['login'])) : ?>

      <!--<div style="font-size:35px;color:#ec870aff">-->
        <?php
        echo "Административная панель приветствует тебя храбрый " . $_SESSION["login"];
        ?>
      <!--</div>-->
      <br><br><a href="./../logout.php" style="color:#f02b2bff">Выйти</a><br><br>

      <a href="./admin_pages/logo.php" style="color:aqua">nav</a> |
       <a href="./admin_pages/logo.php" style="color:aqua">header</a> |
        <!--<a href="./pages/about.php" style="color:aqua">header</a> |-->
  </div>

<?php else:
      echo "<h3>НИ-НИ, НЕЛЬЗЯЯЯЯ</h3>"
?>
  <br><a href="./logout.php" style="color:#f02b2bff">ВЫЙТИ</a>

  <!-- ПРОДОЛЖЕНИЕ СОКРАЩЕННОЙ ЗАПИСИ Т.Е. ЗАКРЫВАЕМ-->
<?php endif ?>

</div>

</body>

</html>