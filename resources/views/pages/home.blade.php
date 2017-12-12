@extends('layouts.base')

{{-- User logged in --}}
@section('content')
    <div class="home">
        <div class="container-fluid">
            <div class="row">
                @include('partials.left-sidebar')

                {{-- Latest articles --}}
                <div class="col-md-6">

                </div>

                @include('partials.right-sidebar')
            </div>
        </div>
    </div>
@endsection
