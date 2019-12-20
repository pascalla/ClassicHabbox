@extends('layouts.frontend')

@section('content')
    <div class="content mt-2">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header ch-card-header">Recent Changes</div>
                    <div class="card-body ch-card-body">
                        @foreach($recents as $recent)
                            <div class="d-flex mb-2">
                                <div class="rare-image">
                                    <img src="{{ $recent->rare->small_image }}" alt="{{ $recent->rare->name }}"/>
                                </div>
                                <div class="rare-details flex-grow-1">
                                    <span class="detail"><b>{{ $recent->rare->name }}</b></span>
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

                @if ($release)
                <div class="card mt-2">
                    <div class="card-header ch-card-header">Current Rare</div>
                    <div class="card-body ch-card-body">
                        <div class="d-flex mb-2">
                            <div class="rare-image">
                                <img src="{{ $release->rare->small_image }}" alt="{{ $release->rare->name }}"/>
                            </div>
                            <div class="rare-details flex-grow-1">
                                <span class="detail"><b>{{ $release->rare->name }}</b></span>
                                <span class="detail">({{ $release->rare->releasePrice->credits}} Credits & {{$release->rare->releasePrice->pixels}} Pixels)</span>
                                <span class="detail">Released: {{$release->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if ($collectablerelease)
                <div class="card mt-2">
                    <div class="card-header ch-card-header">Current Collectable</div>
                    <div class="card-body ch-card-body">
                        <div class="d-flex mb-2">
                            <div class="rare-image">
                                <img src="{{ $collectablerelease->rare->small_image }}" alt="{{ $collectablerelease->rare->name }}"/>
                            </div>
                            <div class="rare-details flex-grow-1">
                                <span class="detail"><b>{{ $collectablerelease->rare->name }}</b></span>
                                <span class="detail">({{ $collectablerelease->rare->releasePrice->credits}} Credits & {{$collectablerelease->rare->releasePrice->pixels}} Pixels)</span>
                                <span class="detail">Released: {{$collectablerelease->created_at}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header ch-card-header">All Rar3s</div>
                    <div class="card-body">
                        <rare-viewer></rare-viewer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
