@extends('layouts.app')
@section('title','user')
@section('content')
    <h1 class="text-center">Role</h1>
    <hr>

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <div class="d-flex justify-content-center mb-3">
        <a href="/inputUser" type="button" class="btn btn-dark">Ajouter</a>
    </div>

    <div class="container">
        <table class="table table-dark w-90 table-bordered" id="zouhair">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="row">Action</th>
                    <th scope="row">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user) 
                <tr>
                    <th scope="row">{{$user->name}}</th>
                    <th scope="row">{{$user->email}}</th>
                    <th scope="row">{{$user->role_name}}</th>
                    <td><a href="/updateUser/{{$user->id}}" type="button" class="btn btn-light">Update</a></td>
                    <td><a href="/deleteUser/{{$user->id}}" type="button" class="btn btn-light">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{$users->links()}}
    </div>
@endsection
