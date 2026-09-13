<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon (11).ico" type="image/x-icon">
    <link rel="stylesheet" href="styles.scss">
  <title>вход в админку</title>
</head>


<body style="background: linear-gradient(45deg, 
#1a2a6c,
#b21f1f, 
#fdbb2d);
min-height:100vh";>

  <h3 style="text-align:center; padding-top: 80px;color: #08f13eff;font-size:50px">ВХОД В АДМИНИСТРАТИВНУЮ ПАНЕЛЬ</h3>

  <form style="text-align:center;padding-top: 30px;" action="./lib/login.php" method="post">
    <label class="lab">login</label><br><br>
    <input class="inp" type="text" name="login" placeholder="Введите логин"><br><br>
    <label class="lab" >password</label><br><br>
    <input class="inp" type="password" name="password" placeholder="Введите пароль"><br><br><br><br>
    <input class="btn" type="submit" name="login-btn" value="Войти"><br><br> 
    <a href="../logout.php"><input style="text-align: center;cursor:pointer; margin-bottom: 50px;" class="btn" type="text"  value="Выйти"></a>
  </form>

</body>