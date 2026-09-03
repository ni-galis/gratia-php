<?php require_once "./pages/nav.php"?>
<?php
$sql = "SELECT * FROM header";
$sql = $pdo->prepare($sql);
$sql->execute();
$header = $sql->fetch(PDO::FETCH_ASSOC);
?>

  <div class="header">
    <div class="container">

      <div class="header__inner" style="background: url('./image/header/<?= $header['filename'] ?>');  background-position: center; background-size: cover;  background-repeat: no-repeat;">

        <img class="header-01" src="./image/header/<?= $header['pic'] ?>" alt="01">
        <img class="header-07" src="./image/header/<?= $header['slide'] ?>" alt="07">
        <span class="header__span"><?= $header['txt'] ?></span>
        <a href="/pages-site/book-table.php"><button class="header__button button"><?= $header['button'] ?></button></a>
        <a href="/footer"><img class="arrow-img" src="./image/header/<?= $header['arrow'] ?>" alt="05"></a>
        
      </div><!--header__inner-->
    </div><!--container-->
  </div><!--header-->

  <br><br>
  <script src="./js/main.js"></script>
</body>

</html>