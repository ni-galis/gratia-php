<?php require_once "./db.php"; ?>
<?php
$sql = "SELECT * FROM meta";
$sql = $pdo->prepare($sql);
$sql->execute();
$meta = $sql->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
    <title><?php echo $meta['title'] ?></title>
  <meta name="description" content="<?php echo $meta['description'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="scss/css/style.css">
  <link rel="shortcut icon" href="./img/favicon/favicon (14).ico" type="image/x-icon">
</head>

<body>

  <div class="nav">
    <div class="container">
      <div class="nav__content">
        <div class="nav-logo">
          <a href="#"><img class="logo-img" src="./image/nav/logo.jpg" alt="logo"></a>
          <a href="#"><span class="logo-txt">Gratia</span></a>
        </div>

        <style>
          .nav-lab {
            color: #fff;
            font-size: 25px;
            color: greenyellow;
          }

          .nav-inp {
            padding: 10px 20px 10px 20px;
            border: 1px solid #fff;
            color: aqua;
            font-size: 25px;

            &::placeholder {
              color: red;
              font-size: 25px;
            }
          }
        </style>

        <form action="./../login.php" method="post">
          <label class="nav-lab">введи пароль 111</label>&nbsp;&nbsp;
          <input class="nav-inp" type="text" name="pass" placeholder="вводи осторожно">&nbsp;&nbsp;
          <input class="nav-inp" type="submit" name="btn" value="войти">
        </form>


        <div class="burger-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="menu-item">
          <ul class="nav__menu">
            <li class="nav__item"><a href="./reg-auth.php" class="nav__link">About</a></li>
            <li class="nav__item"><a href="./reg-auth.php" class="nav__link">Menu</a></li>
            <li class="nav__item"><a href="./reg-auth.php" class="nav__link">Gallery</a></li>
            <li class="nav__item"><a href="./reg-auth.php" class="nav__link">Contact</a></li>
          </ul>
        </div><!--nav__menu-->
      </div><!--nav__content-->
    </div><!--container-->
  </div><!--nav-->