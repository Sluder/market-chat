@extends('layouts.base')

@section('content')
    <div class="symbol">
        <div class="container-fluid">
            <div class="row">
                @include('partials.left-sidebar')

                <div class="col-md-6">
                    symbol
                </div>

                @include('partials.right-sidebar')
            </div>
        </div>
    </div>
@endsection
