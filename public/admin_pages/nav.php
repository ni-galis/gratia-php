<?php session_start() ?>
<h1 style="font-size: 25px;color:#ccff00;">admin_page nav.php</h1>
<?php require_once "./../db.php"; ?>
<?php
$sql = 'SELECT * FROM nav';
$sql = $pdo->prepare($sql);
$sql->execute();
$nav = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon (11).ico" type="image/x-icon">
  <title>РЕДАКТИРОВАНИЕ NAV</title>
</head>

<body style="background: linear-gradient(450deg, 
#000000,
#0f9b0f);
 height:100vh;">

  <h3 style="color:#eeaf3bff; text-align: center; padding-top:80px;font-size:50px">РЕДАКТИРОВАНИЕ ИНФОРМАЦИИ NAV</h3>

  <div style="font-size: 35px; color:#f7a206ff; text-align: center; padding-top:20px;">

    <!--ЕСЛИ СЕССИЯ ЗАКРЫТА Т.Е. ПУСТАЯ ТО НИКТО НЕ ДОЛЖЕН ПОПАСТЬ В admin ДЕЛАЕМ ДЛЯ ЭТОГО СОКРАЩЕННУЮ ЗАПИСЬ-->

    <?php if (!empty($_SESSION['login'])) : ?>

      <?php
      echo "панель навигации для " . $_SESSION["login"];
      ?>

      <br><br><a href="./../logout.php" style="color:#f02b2bff">Выйти</a><br><br>


      <form action="./../lib-admin_pages/nav.php" method="post" enctype="multipart/form-data">

        <label style="font-size: 28px;">logo</label><br>
        <input style="width: 300px;height:50px;font-size:30px;color:blue;padding-left:20px;font-weight:500;"  type="text" name="logo" value="<?= $nav['logo'] ?? '' ?>"><br><br>

          <label style="font-size: 28px;">about</label><br>
        <input  style="width: 300px;height:50px;font-size:30px;color:blue;padding-left:20px;font-weight:500;"  name="about" value="<?= $nav['about'] ?>"><br><br>

        <label style="font-size: 28px;">menu</label><br>
        <input  style="width: 300px;height:50px;font-size:30px;color:blue;padding-left:20px;font-weight:500;"  name="menu" value="<?= $nav['menu'] ?>"><br><br>

        <label style="font-size: 28px;">gallery</label><br>
        <input  style="width: 300px;height:50px;font-size:30px;color:blue;padding-left:20px;font-weight:500;" type="text" name="gallery" value="<?= $nav['gallery'] ?>"><br><br>

        <label style="font-size: 28px;">contact</label><br>
        <input  style="width: 300px;height:50px;font-size:30px;color:blue;padding-left:20px;font-weight:500;" type="text" name="contact" value="<?= $nav['contact'] ?>"><br><br>

        <input style="font-size: 22px;" type="file" name="im"><br><br>
        <input style="margin-bottom:30px; font-size: 25px;" type="submit" name="save"
          value="Сохранить">
      </form>

      <img style="width: 5%;border-radius:10px" src="./../img/<?= $nav['filename'] ?>" alt="05.ipg">


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