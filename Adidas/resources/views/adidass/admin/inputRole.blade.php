@extends('layouts.app')
@section('title','Role')
@section('content')

    <br><br><br>

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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/ajouter/Role" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="role" class="form-label">Roles</label>
                        <input type="text" class="form-control" id="role" name="role">
                    </div>

                    
                    <select id="cat_id" name="cat_id[]" class="form-control">
                        @foreach($routes as $route)
                            <option value="{{ $route->id }}">{{ $route->name }}</option>
                        @endforeach
                    </select>
                    <br><br>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection

