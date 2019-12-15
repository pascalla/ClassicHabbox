@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/rares">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Category</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Category</div>
                    <div class="card-body">
                        <form action="/staff/categories" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="Name">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
