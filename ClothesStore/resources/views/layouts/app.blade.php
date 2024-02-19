<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Clothes Store</title>
  </head>
  <body>

    @guest
    <nav class="navbar navbar-light bg-light" style="background-color: #FFC0CB">
        <a  href="/" class="navbar-brand">Clothes Store</a>
        <form class="form-inline">
          
          <a class="form-control mr-sm-2" href="/register">Register</a>
          <a class="form-control mr-sm-2" href="/login">Login</a>
        </form>
      </nav>
    @endguest

    @auth
    @if (Auth::user()->role == "Buyer")
      
    <nav class="navbar navbar-light bg-light" style="background-color: #FFC0CB">
      <a  href="/" class="navbar-brand">Clothes Store</a>
      <form class="form-inline">
        
        <a class="form-control mr-sm-2" href="/cart">View Cart</a>
        <a class="form-control mr-sm-2" href="/transactionHistory">View Transaction History</a>

        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->role }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/profile">Edit Profile</a>
            <a href="/logout" class="dropdown-item" >Logout</a>
          </div>
        </li>

      </form>
    </nav>
    @elseif (Auth::user()->role == "Seller")
    <nav class="navbar navbar-light bg-light" style="background-color: #FFC0CB">
      <a  href="/" class="navbar-brand">Clothes Store</a>
      <form class="form-inline">
        
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Manage
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/manageUser">Manage User</a>
            <a href="/manageClothes" class="dropdown-item" href="#">Manage Clothes</a>
          </div>
        </li>

        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->role }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/profile">Edit Profile</a>
            <a href="/logout" class="dropdown-item">Logout</a>
          </div>
        </li>

      </form>
    </nav>
    @endif
    @endauth


    @yield('content')

    <footer class="text-center text-lg-start bg-light text-muted">
      
      <div class="text-center p-4" style="background-color: #FFC0CB;">
        {{ date('Y-m-d H:i:s') }} Copyright 2022 Clothes Store
      </div>

    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>