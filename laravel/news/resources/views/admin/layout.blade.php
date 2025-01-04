<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('news.index')}}">News</a>
            <a href="{{ route('categories.index')}}">Categories</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>