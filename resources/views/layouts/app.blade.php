<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">

    <style>
        a {
            text-decoration: none;
            color: rebeccapurple;
        }
    </style>
</head>
<body>
<nav class="container-fluid">
    <ul>
        <li><strong>ORDRLI</strong></li>
    </ul>
    <ul>
        <li><a href="{{ url('items') }}">Items</a></li>
        <li><a href="{{ url('users') }}">Users</a></li>
        <li><a href="{{ url('companies') }}">Companies</a></li>


    </ul>
</nav>

<main class="container">
    @yield('content')
</main>
</body>
</html>
