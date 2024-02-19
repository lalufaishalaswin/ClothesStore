@extends('layouts.app')
@section('content')

<div class="container">
    
    <h1>Insert Clothes</h1>

    <form method="POST" action="/manageClothes" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Product Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Product Name" name="product name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Brand</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Brand" name="brand">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea class="form-control" id="exampleInputPassword1" name="description" placeholder="Description"> </textarea>
          </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Image</label>
            <input type="file" name="cover" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary">Insert</button>
    </form>


</div>

<div class="container mt-5">

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Brand</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($clothess as $clothes)
                
          <tr>
            <th>{{ $clothes->product_name }}</th>
            <td>{{ $clothes->brand }}</td>
            <td>{{ $clothes->description }}</td>
            <td>{{ $clothes->price }}</td>
            <td><a href="/detailClothes/{{ $clothes->id }}" class="btn btn-success"href="/clothesDetail">View Detail</a></td>
            <td>
              <form action="/deleteClothes/{{ $clothes->id }}" method="post">
                @csrf
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
      

</div>

@endsection