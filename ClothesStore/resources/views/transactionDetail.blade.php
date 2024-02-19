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
            <th scope="col">Action</th>
          </tr>
        </thead>
        <?php $total = 0; ?>

        <tbody>

        @foreach ($transaction_details as $td)
                
          <tr>
              
            <th>{{ $td->clothes->product_name }}</th>
            <td>{{ $td->clothes->brand }}</td>
            <td>{{ $td->clothes->price }}</td>
            <td>{{ $td->quantity }}</td>
            <td>{{ $td->quantity  * $td->clothes->price }}</td>
            <td><a href="/detailClothes/{{ $td->clothes->id}}" class="btn btn-primary"href="/clothesDetail">View Detail</a></td>
            <?php $total +=  $td->quantity  * $td->clothes->price ?>
          </tr>
          @endforeach


        </tbody>

      </table>
      
      Total = {{ $total }}


@endsection