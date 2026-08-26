<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon (6).ico" type="image/x-icon">
  <link rel="stylesheet" href="styles.scss">
  <title>Авторизация</title>
</head>

<body style="background: linear-gradient(90deg, 
#f7f7f7,
#b9a0a0,
#794747,
#4e2020,
#111111);
 min-height:100vh;">

  <h3 style="color:cyan; text-align: center; padding-top:110px;font-size:50px;">АВТОРИЗАЦИЯ НА САЙТЕ</h3>

  <form style="text-align:center;padding-top: 20px;" action="/lib/auth.php" method="post">

    <label class="lab">login</label><br><br>
    <input class="inp" type="text" name="login" placeholder="Введите логин"><br><br>
    <label class="lab">password</label><br><br>
    <input class="inp" type="password" name="password" placeholder="Введите пароль"><br><br><br>
    <input class="btn" type="submit" name="auth-btn" value="Войти">

  </form>

</body>