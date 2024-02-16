@extends('layouts.app')
@section('title','Product')
@section('content')

    <br><br><br>
<div class="container mt-5">
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    
    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>

    <form action="/update/product" method="POST" class="form-group" enctype="multipart/form-data">
    @csrf

        <input type="text" name="id" style="display: none;" value="{{ $products->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $products->nom }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $products->description }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prix</label>
            <input type="number" class="form-control" name="prix" value="{{ $products->prix }}">
        </div>
        <div class="form-group">
            <label>Image </label>
            <input type="file" class="form-control" name="image" >
        </div>

        <select id="form_email" name="cat_id" class="form-control">
            @foreach($category as $categories)
            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
