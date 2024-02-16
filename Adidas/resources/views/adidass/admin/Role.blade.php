@extends('layouts.app')
@section('title','Role')
@section('content')
    <h1 class="text-center">Role</h1>
    <hr>

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <div class="d-flex justify-content-center mb-3">
        <a href="/inputRole" type="button" class="btn btn-dark">Ajouter</a>
    </div>

    <div class="container">
        <table class="table table-dark w-90 table-bordered" id="zouhair">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="row">Action</th>
                    <th scope="row">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <th scope="row">{{$role->role}}</th>
                    <td><a href="/updateRole/{{$role->id}}" type="button" class="btn btn-light">Update</a></td>
                    <td><a href="/deleteRole/{{$role->id}}" type="button" class="btn btn-light">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$roles->links()}}
    </div>
@endsection
