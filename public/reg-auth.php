<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="./img/favicon/favicon (3).ico" type="image/x-icon">
  <link rel="stylesheet" href="styles.scss">
  <title>Регистрация или авторизация</title>
</head>

<body style="background: linear-gradient(45deg, 
#0f2027,
#203a43,
#2c5364);
height:100vh;">

  <h3 style="color:#ccff00;text-align: center; padding-top:100px;font-size:50px;">РЕГИСТРАЦИЯ или АВТОРИЗАЦИЯ</h3>


  <div class="reg__auth" style="justify-content: center;">
    <div>
      <form style="text-align:center;padding-top: 50px;" action="/reg.php" method="post">

        <label class="lab">регистрация</label><br><br>
        <input class="btn" type="submit" name="reg-btn" value="регистрация"><br><br>
      </form>
    </div>
    <div>
      <form style="text-align:center;padding-top: 50px;" action="./auth.php" method="post">
        <div>
          <label class="lab">авторизация</label><br><br>
          <input class="btn" type="submit" name="reg-btn" value="авторизация">
        </div>
      </form>
    </div>
  </div>
</body>