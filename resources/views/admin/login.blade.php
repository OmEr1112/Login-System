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

  <form action="{{ route('admin.login') }}" method="post">
  {{ csrf_field() }}
  <h2>Sign in for Admin</h2>
  <p>Don't have an account? <a href="{{ route('admin.register') }}">Register here!</a></p>
    <div>
      <label for="email">Email</label><br>
      <input value="{{ old('email') }}" id="email" type="email" name="email">
    </div>
    <div>
      <label for="password">Password</label><br>
      <input id="password" type="text" name="password">
    </div>
    <div>
      <label>Remember Me</label>
      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
    </div>
    <div>
      <input name="submit" id="password" type="submit" value="Submit">
    </div>
  </form>
  <p>Forgot your password? <a href="{{ route('admin.password.request') }}">Get a reset link!</a></p>

  @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif

</body>
</html>