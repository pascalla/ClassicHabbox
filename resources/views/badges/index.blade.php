@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Badges</li>
            </ol>
        </nav>

        <div class="mb-2">
            <a href="/staff/badges/create"><button class="btn btn-primary">Add Badge</button></a>
        </div>

        <table class="table">
            <tr>
                <td>Image</td>
                <td>Code</td>
                <td>Name</td>
                <td>Desc</td>
                <td>Obtained By</td>
                <td>Options</td>
            </tr>
            @foreach($badges as $badge)
                <tr>
                    <td><img src="{{ $badge->image }}"></td>
                    <td>{{ $badge->code }}</td>
                    <td>{{ $badge->name }}</td>
                    <td>{{ $badge->desc }}</td>
                    <td>{{ $badge->obtained_by }}</td>
                    <td><button class="btn btn-primary">Edit</button></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
