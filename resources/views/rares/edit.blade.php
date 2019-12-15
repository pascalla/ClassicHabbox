@extends('layouts.app')

@section('content')

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/rares">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $rare->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Rare</div>
                    <div class="card-body">
                        <form action="/staff/rares/{{$rare->id}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $rare->name }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Motto</label>
                                <input type="text" class="form-control" id="motto" name="motto" value="{{ $rare->mission }}">
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ ( $category->id == $rare->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="Name">Release Credits</label>
                                <input type="text" class="form-control" id="credits" name="credits" value="{{ $rare->releasePrice()->credits }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Release Pixels</label>
                                <input type="text" class="form-control" id="pixels" name="pixels" value="{{ $rare->releasePrice()->pixels }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Image</label>
                                <input type="text" class="form-control" id="image" name="image" value="{{ $rare->image }}">
                            </div>

                            <div class="form-group">
                                <label for="Name">Small Image</label>
                                <input type="text" class="form-control" id="small_image" name="small_image" value="{{ $rare->small_image }}">
                            </div>

                            <input name="_method" type="hidden" value="PUT">
                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
