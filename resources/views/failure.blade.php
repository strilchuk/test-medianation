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
        <h1>Здравствуйте! </h1>
        <p class="lead">Чтобы пройти 1й этап нужно выполнить ряд условий</p>

        <p>
        <ul>

            <li>Нужен PATCH(а у вас: {{ $method['value'] }}): <span
                    class="badge badge-pill badge-{{ $method['style'] }}">{{ $method['text'] }}</span></li>
            <li>На эту страничку нужно прийти из Google.com : <span
                    class="badge badge-pill badge-{{ $referer['style'] }}">{{ $referer['text'] }}</span></li>
            <li>Эту страничку нужно посетить ровно 33 раза(ваше посещение: {{ $visit['value'] }} ): <span
                    class="badge badge-pill badge-{{ $visit['style'] }}">{{ $visit['text'] }}</span></li>
            <li>В теле запроса должно быть {{ $timestamp['current'] }} (у вас: {{ $timestamp['value'] }} ): <span
                    class="badge badge-pill badge-{{ $timestamp['style'] }}">{{ $timestamp['text'] }}</span></li>

        </ul>
        </p>
    </div>
</main>
</body>
</html>
