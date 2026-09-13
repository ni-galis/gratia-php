<?php require_once "./pages/nav.php" ?>
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

<section class="perfection">
  <div class="container">

    <div class="perfection__content">

      <div class="perfection__top">
        <h2 class="perfection__title">PERFECTION</h2>
        <div class="perfection__suptitle">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <img class="top-pic" src="/image/perfection/05-1.png" alt="05-1">

      </div><!--perfection__top-->

      <div class="perfection__row">
        <div class="desserts">
          <img class="desserts-img" src="/image/perfection/03.jpg" alt="desserts-img">
        </div>

        <div class="smoothies">
          <img class="smoothies-img" src="/image/perfection/02-2.jpg" alt="smoothies-img">
        </div>

        <div class="breakfast">
          <img class="breakfast-img" src="/image/perfection/01.jpg" alt="breakfast-img">
        </div>
      </div><!--perfection__row-->

      <a href="/our-offers.php" class="perfection__link-pic">
        <img class="pic-4" src="/image/perfection/04.png" alt="04">
      </a>
    </div><!--perfection__content-->
  </div><!--container-->
</section>

<br><br>
<script src="./js/main.js"></script>
</body>

</html>