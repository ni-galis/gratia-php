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


<section class="reach-this">
  <div class="container">
    <div class="reach-this__content">

      <div class="reach-this_content">

        <div class="reach-this__top">
          <h2 class="reach-this__title title">HOW WE REACH THIS?</h2>
          <div class="reach-this__suptitle suptitle">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
          <img class="this-pic" src="/image/reach-this/this-pic.png" alt="05-1">

        </div><!--perfection__top-->

        <div class="reach-this__row">
          <div class="diffrent">
            <img src="/image/reach-this/01.jpg" alt="01">
          </div>
          <div class="fresh">
            <img src="/image/reach-this/02.jpg" alt="02">
          </div>
          <div class="best">
            <img src="/image/reach-this/03.jpg" alt="03">
          </div>
        </div>
      </div>

    </div>
</section>


<br>
<script src="./js/main.js"></script>
</body>

</html>