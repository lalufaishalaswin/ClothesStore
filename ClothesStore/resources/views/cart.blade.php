@extends('layouts.app')
@section('content')


<div class="container mt-5">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub Total</th>
            <th scope="col"  colspan="3">Action</th>
          </tr>
        </thead>
        <?php $total = 0; ?>

        <tbody>
            @if(session('cart'))
            @foreach (session('cart') as $id => $cart)
          <tr>
              
            <th>{{ $cart['product_name'] }}</th>
            <td>{{ $cart['brand'] }}</td>
            <td>{{ $cart['price'] }}</td>
            <td>{{ $cart['quantity'] }}</td>
            <td>{{ $cart['quantity'] * $cart['price'] }}</td>
            <td><a href="/detailClothes/{{ $id }}" class="btn btn-primary"href="/clothesDetail">View Detail</a></td>
            

            <td><a href="/detailClothes/{{ $id }}" class="btn btn-success"href="/clothesDetail">Edit</a></td>

            <td>
                <form action="/deleteCart" method="post">
                  @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
          </tr>
            <?php $total += $cart['quantity'] * $cart['price']  ?>
          @endforeach
          @endif

        </tbody>
      </table>
      
      Total : {{ $total }}
<br>
      <a class="btn btn-primary" href="/checkout">Checkout</a>

</div>

@endsection