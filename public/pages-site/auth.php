<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/img/favicon/favicon (6).ico" type="image/x-icon">
  <link rel="stylesheet" href="/styles.scss">
  <!--<link rel="stylesheet" href="/styles.scss" media="screen and (min-width: 1921px)">-->
  <link rel="stylesheet" href="../scss/css/style.css">
  <title>Авторизация</title>
</head>

<html>

<body style="background: linear-gradient(90deg, 
#f7f7f7,
#b9a0a0,
#794747,
#4e2020,
#111111);
 min-height:100vh;">

  <div class="auth">
    <div class="container">
      <div class="aur__content">

        <h3 class="auth__title" style="color:cyan; text-align: center; padding-top:110px;font-size:45px;">АВТОРИЗАЦИЯ НА САЙТЕ</h3>

        <form style="text-align:center;padding-top: 20px;" action="/lib/auth.php" method="post">

          <label class="lab">login</label><br><br>
          <input class="inp" type="text" name="login" placeholder="Введите логин"><br><br>
          <label class="lab">password</label><br><br>
          <input class="inp" type="password" name="password" placeholder="Введите пароль"><br><br><br>
        
          <a href="/logout.php"><input  class="inp" style="  text-align:center;cursor:pointer;color:blue;width: auto;" value="Выйти"></a>
            <input class="inp" style="background-color: #ccc;color:blue;" type="submit" value="Войти">


        </form>

      </div>
    </div>
  </div>

</body>

</html>