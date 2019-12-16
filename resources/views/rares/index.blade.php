@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>

        <div class="mb-2">
            <a href="/staff/rares/create"><button class="btn btn-primary">Add Rare</button></a>
        </div>

        <div class="mb-2">
            <a href="/staff/categories/create"><button class="btn btn-primary">Add Category</button></a>
        </div>

        <table class="table">
            <tr>
                <td>Image</td>
                <td>Rare Name</td>
                <td>Rare Price</td>
                <td>Rare Options</td>
            </tr>
            @foreach($rares as $rare)
                <tr>
                    <td><img src="{{ $rare->small_image }}"/></td>
                    <td>{{ $rare->name }}</td>
                    <td>{{ $rare->currentPrice->credits }}c</td>
                    <td>
                        <a href="/staff/prices/{{ $rare->id }}"><button class="btn btn-warning">Update Price</button></a>
                        <a href="/staff/rares/{{ $rare->id }}/edit"><button class="btn btn-primary">Edit</button></a>
                        <a href="/staff/prices/{{ $rare->id }}"><button class="btn btn-primary">View</button></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
