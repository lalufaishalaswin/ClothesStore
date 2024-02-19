@extends('layouts.app')
@section('content')

@auth
    @if(Auth::user()->role == "Seller")
<div class="container">
    
    <h1>Update Clothes</h1>

    <form method="POST" action="/updateClothes/{{ $clothes->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name" name="product name" value="{{ $clothes->product_name }}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Brand</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Brand" name="brand" value="{{ $clothes->brand }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea class="form-control" id="exampleInputPassword1" name="description" >{{ $clothes->description }}</textarea>
          </div>
        

        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price" value="{{ $book->price }}">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Cover</label>
            <input type="file" name="cover" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


</div>

    @elseif (Auth::user()->role == "Buyer")
    <div class="container mt-5">
        <div class="row">
          <div class="col border border-dark py-2">
            <div class="p-3">
              <p class="fs-4">{{ $clothes->detail }}</p>
    
              <div class="row">
                <div class="col-4">
                  <img src="storage/app/public{{$clothes->cover}}" alt="Detail" style="width: 18rem; height: auto" />
                </div>
    
                <div class="col-8">
                  <div class="row">
                    <p class="col-3">Product Name</p>
                    <p class="col">{{ $clothes->product_name }}</p>
                  </div>
    
                  <div class="row">
                    <p class="col-3">Brand</p>
                    <p class="col">{{ $clothes->brand }}</p>
                  </div>
    
                  <div class="row">
                    <p class="col-3">Description</p>
                    <p class="col">
                        {{ $clothes->description }}
                    </p>
                  </div>
    
                  <div class="row">
                    <p class="col-3">Price</p>
                    <p class="col">IDR {{ $clothes->price }}</p>
                  </div>
    
                  <div class="row">
                    <div class="col-3 input-group">
                      <span class="input-group-text">Quantity</span>
                      <form action="/addToCart/{{ $book->id }}" method="post">
                        @csrf
                      <input type="text" class="form-control" name="quantity" value="1" />
                      <button type="submit" class="btn btn-primary">Add to Cart</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    @endif
@endauth

@guest
<div class="container mt-5">
  <div class="row">
    <div class="col border border-dark py-2">
      <div class="p-3">
        <p class="fs-4">{{$clothes->detail}} Detail</p>

        <div class="row">
          <div class="col-4">
            <img src="storage/{{$clothes->cover}}" alt="Detail" style="width: 18rem; height: auto" />
          </div>

          <div class="col-8">
            <div class="row">
              <p class="col-3">Product Name</p>
              <p class="col">{{ $clothes>product_name }}</p>
            </div>

            <div class="row">
              <p class="col-3">Brand</p>
              <p class="col">{{ $clothes->brand }}</p>
            </div>

            <div class="row">
              <p class="col-3">Description</p>
              <p class="col">
                  {{ $clothes->description }}
              </p>
            </div>

            <div class="row">
              <p class="col-3">Price</p>
              <p class="col">IDR {{ $book->price }}</p>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endguest


@endsection