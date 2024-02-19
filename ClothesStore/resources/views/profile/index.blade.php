@extends('layouts.app')
@section('content')

<div class="container">
    
    <h1>Edit Profile</h1>

    <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Fullname</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fullname" name="fullname">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Email</label>
          <p class="form-control">{{ $user->email }}</p>
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/changePassword/{{ $user->id }}" class="btn btn-primary">Change Password</a>
    </form>


</div>



@endsection