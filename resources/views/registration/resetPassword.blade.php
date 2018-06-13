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

  h2 {
    margin-left: 40px;
  }
</style>

  <form method="post" action="{{ route('password.request') }}">
  {{ csrf_field() }}
  <h2>Reset Password</h2>
  <input type="hidden" name="token" value="{{ $token }}">
    <div>
      <label for="email">Email</label><br>
      <input id="email" name="email" type="email">
    </div>
    <div>
      <label for="password">Password</label><br>
      <input id="password" name="password" type="text">
    </div>
    <div>
      <label for="confirmPassword">Confirm Password</label><br>
      <input id="confirmPassword" name="password_confirmation" type="text">
    </div>
    <div>
      <input id="password" type="submit" value="Submit">
    </div>
  </form>

  @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
  @endif
</body>
</html>