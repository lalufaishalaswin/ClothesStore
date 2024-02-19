@extends('layouts.app')
@section('content')

<div class="container">


<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                
          <tr>
            <th>{{ $user->fullname }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role}}</td>
            <td><a href="/userDetail/{{ $user->id }}" class="btn btn-success">View Detail</a></td>
            @if ($user->role == "Member")
              
            <td>
              <form action="/deleteUser/{{ $user->id }}" method="post">
                @csrf
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach

        </tbody>
      </table>
</div>


@endsection