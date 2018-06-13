<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<style>
  div {
    margin: 0 auto 20px 40px;
  }

  h2, p {
    margin-left: 40px;
  }
</style>

  <form action="{{ route('admin.register') }}" method="post">
  {{ csrf_field() }}
  <h2>Registration for Admin</h2>
  <p>Already have an account <a href="{{ route('admin.login') }}">Login here!</a> </p>
    <div>
      <label for="name">Name</label><br>
      <input name="name" id="name" type="text">
    </div>
    <div>
      <label for="email">Email</label><br>
      <input name="email" value="{{ old('email') }}" id="email" type="email">
    </div>
    <div>
      <label for="password">Password</label><br>
      <input id="password" type="text" name="password">
    </div>
    <div>
      <label for="confirmPassword">Confirm Password</label><br>
      <input id="confirmPassword" type="text" name="password_confirmation">
    </div>
    <div>
      <input name="submit" id="password" type="submit" value="Submit">
    </div>
  </form>
  <p>Don't remember your password? <a href="{{ route('admin.password.request') }}">Get a reset link!</a></p>

  @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif

</body>
</html>