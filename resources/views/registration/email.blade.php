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
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

  <form action="{{ route('password.email') }}" method="post">
  {{ csrf_field() }}
  <h2>Get the Reset Link</h2>
    <div>
      <label for="email">Email</label><br>
      <input name="email" id="email" type="email" value="{{ old('email') }}">
    </div>
    <div>
      <input name="submit" id="password" type="submit" value="Submit">
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