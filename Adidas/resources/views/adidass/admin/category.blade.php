@extends('layouts.app')
@section('title','Category')
@section('content')
    <h1 class="text-center">Category</h1>
    <hr>

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <div class="d-flex justify-content-center mb-3">
        <a href="/inputCategory" type="button" class="btn btn-dark">Ajouter</a>
    </div>

    <div class="container">
        <table class="table table-dark w-90 table-bordered" id="zouhair">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{ $category->id }}</th>
                    <td>{{ $category->name }}</td>
                    <td><a href="/updateCategory/{{$category->id}}" type="button" class="btn btn-light">Update</a></td>
                    <td><a href="/deleteCategory/{{$category->id}}" type="button" class="btn btn-light">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
@endsection
