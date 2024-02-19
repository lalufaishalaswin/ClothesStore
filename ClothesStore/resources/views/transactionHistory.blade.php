@extends('layouts.app')
@section('content')


<div class="container mt-5">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Transaction ID</th>
            <th scope="col">Transaction Date</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            @foreach ($transactions as $transaction)
                
            <th>{{ $transaction->id }}</th>
            <td>{{ $transaction->transactiondate }}</td>
            <td><a href="/transactionDetail/{{ $transaction->id }}" class="btn btn-success">Detail</a></td>
          </tr>
          @endforeach

        </tbody>
      </table>


</div>

@endsection