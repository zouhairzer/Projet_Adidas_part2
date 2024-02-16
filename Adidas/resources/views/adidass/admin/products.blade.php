@extends('layouts.app')
@section('title','Product')
@section('content')
    <br>
    <div class="container">
        <h1 class="text-center">Products</h1>
        <hr>
        
        <div class="d-flex justify-content-center mb-3">
            <a href="/inputProduct" type="button" class="btn btn-dark">Ajouter</a>
        </div>
        <table class="table table-dark table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->nom }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->prix }}</td>
                        <td><img width="100" height="70" src="images/{{ $product->image }}" alt="{{ $product->nom }} Image"></td>
                        <td><a href="/updateProduct/{{ $product->id }}" type="button" class="btn btn-light">Update</a></td>
                        <td><a href="/deleteProduct/{{ $product->id }}" type="button" class="btn btn-light">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
