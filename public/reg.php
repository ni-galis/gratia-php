<?php session_start();?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon (12).ico" type="image/x-icon">
  <link rel="stylesheet" href="styles.scss">
  <title>Регистрация на сайте</title>
</head>

<body style="background: linear-gradient(45deg, 
#8a2be2,
#0000cd, 
#228b22,
#ccff00);
height:100vh;">

  <h3 style="color:#ccff00;text-align: center; padding-top:50px;font-size:50px;">РЕГИСТРАЦИЯ НА САЙТЕ</h3>


  <form style="text-align:center;padding-top: 10px;" action="./lib/reg.php" method="post">

    <label class="lab">имя</label><br><br>
    <input class="inp" type="text" name="username" placeholder="Введите свое имя"><br><br>
    <label class="lab">login</label><br><br>
    <input class="inp" type="text" name="login" placeholder="Введите логин"><br><br>
    <label class="lab">password</label><br><br>
    <input class="inp" type="password" name="password" placeholder="Введите пароль"><br><br>
    <label class="lab">email</label><br><br>
    <input class="inp" type="email" name="email" placeholder="Введите email"><br><br><br>
    <input class="btn" type="submit" name="reg-btn" value="Войти">

  </form>

</body>