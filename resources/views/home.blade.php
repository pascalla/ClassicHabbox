@extends('layouts.frontend')

@section('content')
    <div class="content mt-2">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header ch-card-header">Recent Changes</div>
                    <div class="card-body ch-card-body">
                        @foreach($recents as $recent)
                            <div class="d-flex mb-2">
                                <div class="rare-image">
                                    <img src="{{ $recent->rare()->small_image }}" alt="{{ $recent->rare()->name }}"/>
                                </div>
                                <div class="rare-details flex-grow-1">
                                    <span class="detail"><b>{{ $recent->rare()->name }}</b></span>
                                    <span class="detail">{{ $recent->credits/50 }} Goldbars / {{ $recent->credits }} Credits</span>
                                    <span class="detail">Updated: {{$recent->updated_at}}</span>
                                </div>
                                <div>
                                    <img src="{{ $recent->status() }}" class="mt-3"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header ch-card-header">Current Rare</div>
                    <div class="card-body ch-card-body">
                        <div class="d-flex mb-2">
                            <div class="rare-image">
                                <img src="{{ $release->rare()->small_image }}" alt="{{ $release->rare()->name }}"/>
                            </div>
                            <div class="rare-details flex-grow-1">
                                <span class="detail"><b>{{ $release->rare()->name }}</b></span>
                                <span class="detail">({{ $release->rare()->releasePrice()->credits}} C & {{$release->rare()->releasePrice()->pixels}} Pixels)</span>
                                <span class="detail">Releases: {{$release->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header ch-card-header">Current Collectable</div>
                    <div class="card-body ch-card-body">
                        <div class="d-flex mb-2">
                            <div class="rare-image">
                                <img src="{{ $collectablerelease->rare()->small_image }}" alt="{{ $collectablerelease->rare()->name }}"/>
                            </div>
                            <div class="rare-details flex-grow-1">
                                <span class="detail"><b>{{ $collectablerelease->rare()->name }}</b></span>
                                <span class="detail">({{ $collectablerelease->rare()->releasePrice()->credits}} C & {{$collectablerelease->rare()->releasePrice()->pixels}} Pixels)</span>
                                <span class="detail">Releases: {{$collectablerelease->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header ch-card-header">All Rares</div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start flex-wrap rare-body">
                            @foreach($rares as $rare)
                                <div id="{{ $rare->name }}">
                                    <a href="#">
                                        <div class="rare-icon">
                                            <img src="{{ $rare->small_image }}" alt="{{ $rare->name }}"/>
                                        </div>
                                    </a>
                                </div>

                                <b-popover target="{{ $rare->name }}" triggers="hover" placement="top">
                                    ({{ $rare->price()->credits/50 }} Goldbars / {{ $rare->price()->credits }} Credits)
                                </b-popover>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
