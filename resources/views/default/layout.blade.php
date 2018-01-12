<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="title" content="@yield('meta_title')">
    <meta name="description" content="@yield('meta_description')">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            @yield('content')
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
</body>
</html>