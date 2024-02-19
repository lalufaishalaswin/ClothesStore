@extends('layouts.app')
@section('content')

<div class="container">
    
    <h1>{{ $user->fullname }}'s Detail</h1>

    <form method="POST" action="/userUpdate/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="fullname" value="{{ $user->fullname }}">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="email" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="role" value="{{ $user->role }}">
        </div>
  
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>



@endsection