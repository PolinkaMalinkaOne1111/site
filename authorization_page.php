<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Авторизация</title>
</head>

<body>
    <div class="logo">
        <img src="img/logo.png" alt="logo" class="logotipchik">
    </div>
    <h1 class="zagol">Авторизация</h1>
    <form class="auth_form" method="post" action="login.php">
        <div class="form-group">
            <label for="login">Логин</label>
            <input type="text" id="login" name="login" placeholder="Введите логин" required>
        </div>
        <div class="form-group password-toggle">
            <label for="pass">Пароль</label>
            <input type="password" id="pass" name="pass" placeholder="••••••" required>

        </div>

        <button type="submit" class="submit-form_button">Войти</button>


        <div class="register">
            Нет аккаунта?<br>
            <a href="registration_page.php">Зарегистрироваться</a>
        </div>

    </form>
</body>

</html>