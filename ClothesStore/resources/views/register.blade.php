@extends('layouts.app')
@section('content')

<style>

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>


<main class="form-signin">
    <form method="POST" action="/register">
        @csrf
      <h1 class="h3 mb-3 fw-normal">Register</h1>
  
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
      </div>
      <div class="form-floating">
        <input type="text" name="fullname" class="form-control" id="floatingPassword" placeholder="Fullname">
        @if ($errors->has('fullname'))
          <span class="text-danger">{{ $errors->first('fullname') }}</span>
        @endif
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        @if ($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="form-floating">
        <input type="password" name="password2" class="form-control" id="floatingPassword" placeholder="Repeat Password">
        @if ($errors->has('password2'))
          <span class="text-danger">{{ $errors->first('password2') }}</span>
        @endif
      </div>
  
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    </form>
</main>

@endsection