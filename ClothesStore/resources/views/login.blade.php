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
    <form method="post" action="/login">
        @csrf
      <h1 class="h3 mb-3 fw-normal">Login</h1>
  
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
      </div>
      <div class="form-floating">
        <input type="password"  name="password" class="form-control" id="floatingPassword" placeholder="Password">
      </div>
  
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember-me" value="remember-me"> Remember me
        </label>
      </div>
      
        
      <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
    </form>
</main>

@endsection