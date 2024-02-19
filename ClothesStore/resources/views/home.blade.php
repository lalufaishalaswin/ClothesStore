@extends('layouts.app')
@section('content')

<div class="container">
    <form action="/home" method="get">
        @csrf
        <input name="search" type="text">
        <button type="submit">Search</button>
    </form>

    <a href="/home">Clear Filter</a>


</div>

<div class="row">
  @foreach ($clothess as $clothes )

    <div class="col">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="storage/{{$clothes->cover}}" alt="Clothes Image">
            <div class="card-body">
              <h5 class="card-title">{{ $clothes->product_name }}</h5>
              <p class="card-text">By {{ $clothes->brand  }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">IDR {{ $clothes->price }}</li>
            </ul>
            <div class="card-body">
              @guest
              <a href="/detailClothes/{{ $clothes->id }}" class="card-link">View Detail</a>
              @endguest

              @auth

                <a href="/detailClothes/{{ $clothes->id }}" class="card-link">View Detail</a>

              @endauth

              {{-- <a href="#" class="card-link">Another link</a> --}}
            </div>
          </div>
    </div>

    @endforeach

</div>

{{ $clothess->links("pagination::bootstrap-4") }}


@endsection
