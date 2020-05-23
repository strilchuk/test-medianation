<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SearchBooster - тестовое задание</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">
    <div>
        <h1>Поздравляем! </h1>
        <p>Напишите пожалуйста <strong>'Я прошел, мое резюме: {ССЫЛКА_НА_РЕЗЮМЕ}'</strong> в телеграмм <strong>@king5551</strong></p>
        <p>Обязательно оставьте свои контактные данные, и мы с Вами свяжемся быстрее!</p>
        <form action="/welcome/{{ $mark }}" method="post">
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Номер телефона">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email"  name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="skype">Skype</label>
                <input type="skype" class="form-control" id="skype" name="skype" placeholder="Skype">
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</main>
</body>
</html>
