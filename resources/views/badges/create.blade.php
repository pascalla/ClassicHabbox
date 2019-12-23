@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/badges">Badges</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Badge</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add Badge</div>
                    <div class="card-body">
                        <form action="/staff/badges" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="code">Badge Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Badge Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="desc">Badge Desc</label>
                                <input type="text" class="form-control" id="desc" name="desc" value="{{ old('desc') }}">
                            </div>

                            <div class="form-group">
                                <label for="obtained_by">Badge Obtained By:</label>
                                <input type="text" class="form-control" id="obtained_by" name="obtained_by" value="{{ old('obtained_by') }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Badge Image</label>
                                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
