<?php require_once "./pages/nav.php"; ?>
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

<?php require_once "./pages/perfection.php"; ?>

<?php require_once "./pages/details.php"; ?>

<?php require_once "./pages/reach-this.php"; ?>

<footer class="footer">
  <div class="container">  

    <div class="footer__content">

      <div class="footer__top">
        <img class="footer__footer-logo" src="/image/footer/footer-logo.jpg" alt="footer-logo">
      </div><!--footer__top-->

      <div class="footer__title">Gratia Restaurant</div>
      <span class="footer__txt">Copyright 2016. All rights reserved by symu</span>

      <div class="social">
        <img class="fb-img" src="/image/footer/FB.jpg" alt="fb">
        <img class="tr-img" src="/image/footer/TR.jpg" alt="tr">
        <img class="ig-img" src="/image/footer/IG.jpg" alt="ig">
      </div>
    </div><!--footer__content-->
  </div><!--container-->
</footer>



<br>
<script src="./js/main.js"></script>
</body>

</html>