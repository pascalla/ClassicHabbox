@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/badges">Badges</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Badge</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Badge</div>
                    <div class="card-body">
                        <form action="/staff/badges/{{$badge->id}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="code">Badge Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $badge->code }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Badge Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $badge->name }}">
                            </div>

                            <div class="form-group">
                                <label for="desc">Badge Desc</label>
                                <input type="text" class="form-control" id="desc" name="desc" value="{{ $badge->desc }}">
                            </div>

                            <div class="form-group">
                                <label for="obtained_by">Badge Obtained By:</label>
                                <input type="text" class="form-control" id="obtained_by" name="obtained_by" value="{{ $badge->obtained_by }}">
                            </div>

                            <div class="form-group">
                                <label for="image">Badge Image</label>
                                <input type="text" class="form-control" id="image" name="image" value="{{ $badge->image }}">
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
