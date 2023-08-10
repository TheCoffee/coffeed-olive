<!DOCTYPE html>
<html>

<head>
    <title>OLIVE</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('favorites.index') }}">View All Favourites</a></li>
                <li><a href="{{ route('favorites.create') }}">Add New Favourite</a>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
