@extends('layouts.app')
@section('content')

<div class="container">
    
    <h1>Change Password</h1>

    <form method="POST" action="/changePassword/{{ $user->id }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Old Password</label>
          <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">New Password</label>
          <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="new_pass">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">New Confirmation Password</label>
            <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="new_confirm_pass">
        </div>
  
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>



@endsection