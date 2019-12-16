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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $rare->name }}</div>
                    <div class="card-body">
                        <p>Mission: {{$rare->mission}}</p>
                        <img src="{{ $rare->image }}">
                        <img src="{{ $rare->small_image }}">
                        <p>{{ $rare->price()->credits }}c / {{ $rare->price()->credits }} Goldbars</p>

                        <form action="/staff/prices" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="Name">Credits</label>
                                <input type="text" class="form-control" id="credits" name="credits" value="{{ $rare->price()->credits  }}">
                            </div>

                            <input type="hidden" name="rare_id" value="{{ $rare->id }}"/>
                            <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Price History</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>Date</td>
                                <td>Credits</td>
                                <td>User</td>
                            </tr>
                            @foreach($rare->priceHistory as $price)
                                <tr>
                                    <td>{{ $price->created_at }}</td>
                                    <td>{{ $price->credits }}</td>
                                    <td>{{ $price->user->name }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
