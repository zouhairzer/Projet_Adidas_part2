@extends('layouts.app')
@section('title','Role')
@section('content')

    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger">{{ $error }}</li>
            @endforeach
        </ul>

        <form action="/update/Role" method="POST" class="form-group">
            @csrf

            <input type="hidden" name="id" value="{{ $Role->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="{{ $Role->role }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
