@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/rares">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Rare</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Rare</div>
                    <div class="card-body">
                        <form action="/staff/rares" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Motto</label>
                                <input type="text" class="form-control" id="motto" name="motto" value="{{ old('motto') }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Name">Release Credits</label>
                                <input type="text" class="form-control" id="credits" name="credits" value="{{ old('credits') }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Release Pixels</label>
                                <input type="text" class="form-control" id="pixels" name="pixels" value="{{ old('pixels') }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Image</label>
                                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Small Image</label>
                                <input type="text" class="form-control" id="small_image" name="small_image" value="{{ old('small_image') }}">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rare_release" name="rare_release" value="1">
                                <label for="rare_release" class="form-check-label">Catalogue Released Rare</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="collectable_release" name="collectable_release" value="1">
                                <label for="collectable_release" class="form-check-label">Catalogue Released Collectable</label>
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
