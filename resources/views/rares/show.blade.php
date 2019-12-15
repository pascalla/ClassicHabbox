@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/staff/rares">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $rare->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">{{ $rare->name }}</div>
                    <div class="card-body">
                        <img src="{{ $rare->image }}">
                        <img src="{{ $rare->small_image }}">
                        <p>Mission: {{$rare->mission}}</p>
                        <p>Category: {{$rare->category()->name }}</p>
                        <p>Release Credits: {{ $rare->price()->credits }}</p>
                        <p>Release Pixels: {{ $rare->price()->pixels }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
