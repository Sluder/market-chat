@extends('layouts.base')

@section('content')
    <div class="room">
        <div class="container-fluid">
            <div class="row">
                @include('partials.left-sidebar')

                <div class="col-md-6">
                    <p>{{ $room->name }}</p>
                </div>

                @include('partials.right-sidebar')
            </div>
        </div>
    </div>
@endsection
