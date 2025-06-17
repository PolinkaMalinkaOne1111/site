<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style_register.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Регистрация</title>
</head>

<body>
    <div class="logo">
        <img src="img/logo.png" alt="logo" class = "logotipchik">
    </div>
    <h1>Регистрация</h1>
    <form class="auth_form" method="post" action="register.php">
        <div class="form-group">
            <label for="login">Логин*</label>
            <input type="text" id="login" name="login" placeholder="Введите логин" required>
            <div class="form-group">
                <label for="pass">Пароль*</label>
                <input type="password" id="pass" name="pass" placeholder="••••••" required>
            </div>
            <div class="form-group">
                <label for="surname">Фамилия*</label>
                <input type="text" id="surname" name="surname" placeholder="Иванов" required>
            </div>
            <div class="form-group">
                <label for="surname">Имя*</label>
                <input type="text" id="name" name="name" placeholder="Иван" required>
            </div>
            <div class="form-group">
                <label for="surname">Отчество*</label>
                <input type="text" id="last_name" name="last_name" placeholder="Иванович" required>
            </div>
            <div class="form-group">
                <label for="surname">E-mail*</label>
                <input type="email" id="email" name="email" placeholder="example@mail.ru" required>
            </div>
            <div class="form-group">
                <label for="surname">Телефон*</label>
                <input type="phone" id="phone" name="phone" placeholder="+7(123)4567893" required>
            </div>
            <div class="reg_info">* - обязательное поле</div>
            <button type="submit" class="submit-form_button1">Зарегистрироваться</button>
    </form>
    <script src="script.js"></script>
</body>

</html>