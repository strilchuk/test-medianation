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
        <h1>Логин</h1>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="phone">Пользователь</label>
                <input class="form-control" id="user" name="user" placeholder="Имя пользователя">
            </div>
            <div class="form-group">
                <label for="pass">Пароль</label>
                <input type="password" class="form-control" id="pass"  name="pass" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-primary">Логин</button>
        </form>
        {{ isset($wrong)?"Не верный логин или пароль":"" }}
    </div>
</main>
</body>
</html>
