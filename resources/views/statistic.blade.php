<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SearchBooster - тестовое задание</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<main role="main" class="container-fluid">
    @include('nav')

    <br>
    <br>
    <br>
    <div class="table-responsive">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">IP</th>
                <th scope="col">Результат</th>
                <th scope="col">Дата</th>
                <th scope="col">Referer</th>
                <th scope="col">Метод</th>
                <th scope="col">Визит</th>
                <th scope="col">Контент</th>
                <th scope="col">Клиент</th>
                <th scope="col">Авторизация</th>
            </tr>
            </thead>
            <tbody>
            @php
                $rowNum = 0;
            @endphp
            @foreach ($data as $row)
                @php
                    $rowNum++;

                    if ($row['result']==1)
                        $resultText = '<div class="badge badge-success">Успех</div>';
                    else
                        $resultText = '<div class="badge badge-warning">Неудача</div>';

                @endphp
                <tr>
                    <th scope="row">{{$rowNum}}</th>
                    <td><a href="/statistic?ip={{ $row['ip'] }}">{{ $row['ip'] }}</a></td>
                    <td>{!!$resultText!!}</td>
                    <td>{{\DateTime::createFromFormat('Y-m-d\TH:i:s.uZ', $row['created_at'])->format('d-m-Y H:i:s')}}</td>
                    <td>{{ $row['referer'] }}</td>
                    <td>{{ $row['method'] }}</td>
                    <td>{{ $row['visit'] }}</td>
                    <td>{{ $row['body'] }}</td>
                    <td>{{ $row['useragent'] }}</td>
                    <td>{{ $row['auth'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</main>
</body>
</html>
