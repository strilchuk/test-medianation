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
                <th scope="col">Телефон</th>
                <th scope="col">Почта</th>
                <th scope="col">Скайп</th>
            </tr>
            </thead>
            <tbody>
            @php
                $rowNum = 0;
            @endphp
            @foreach ($data as $row)
                @php
                    $rowNum++;
                @endphp
                <tr>
                    <th scope="row">{{$rowNum}}</th>
                    <td>{{ $row['ip'] }}</td>
                    <td>{{ $row['phone'] }}</td>
                    <td>{{ $row['email'] }}</td>
                    <td>{{ $row['skype'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</main>

</body>
</html>
