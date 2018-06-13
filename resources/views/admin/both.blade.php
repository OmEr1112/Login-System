<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Welcome, Admin and Editor {{ $user->name }}</h1>
  <p><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></p>
  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</body>
</html>