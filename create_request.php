<!--  -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
    <link rel="icon" href="img/logo.png" type="image/png">
    <title>Создание заявки</title>
    <style>

    </style>
    <script src="script.js"></script>
</head>

<body>

    <div class="container">
        <div class="header">
            <a href="cabinet.php"><img src="img/logo.png" alt="logo" class="logotipchik"></a>
            <h1 class="title">Создание заявки</h1>
            <form action="logout.php" class="logout-form">
                <button type="submit" class="logout-button">
                    <img src="img/logout.png" alt="logout-button">
                </button>
                <div id="logoutModal">
                    <p>Вы действительно хотите выйти?</p>
                    <button onclick="logout()">Да</button>
                    <button onclick="closeModal()">Нет</button>
                </div>
            </form>
        </div>
        <form class="auth_form" method="post" action="request.php">
            <div class="form-group">
                <label for="address">Адрес*</label>
                <input type="text" id="address" name="address" placeholder="Введите адрес" required>
            </div>
            <div class="form-group">
                <label for="phone">Телефон*</label>
                <input type="phone" id="phone" name="phone" placeholder="+7(123)4567891" required>
            </div>
            <div class="form-group">
                <label for="service_name">Тип услуги*</label>
                <select name="service_name" id="service_name">
                    <option value="" disabled selected hidden> Выберите услугу</option>
                    <option
                        value="Общий клининг">Общий клининг</option>
                    <option value="Генеральная уборка">Генеральная уборка</option>
                    <option value="Послестроительная уборка">Послестроительная уборка</option>
                    <option value="Химчистка ковров и мебели">Химчистка ковров и мебели</option>
                </select>
            </div>

            <div class="checkbox-cont">
                <input id="checkbox" type="checkbox">
                <label id="checkLabel" for="checkbox">Иная услуга</label>
            </div>

            <div id="customServiceContainer" class="form-group" style="display: none;">
                <label for="custom_service">Введите название услуги:</label>
                <input type="text" id="custom_service" name="custom_service" placeholder="Введите услугу">
            </div>

            <div class="form-group">
                <label for="date">Дата и время*</label>
                <input type="datetime-local" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="surname">Тип оплаты*</label>
                <select name="payment" id="payment" required>
                    <option value="" disabled selected hidden> Выберите тип оплаты</option>
                    <option value="По карте">По карте</option>
                    <option value="Наличными">Наличными</option>
                </select>
            </div>
            <div class="reg_info">* - обязательное поле</div>
            <button type="submit" class="submit-form_button">Сформировать заявку</button>
        </form>
    </div>
</body>

</html>