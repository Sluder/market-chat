@extends('layouts.base')

@section('content')
    <div class="room full-height">
        <div class="container-fluid full-height">
            <div class="row full-height">
                @include('partials.left-sidebar')

                <div class="col-md-6 col-md-offset-3 center-content full-height">
                    <div class="panel-group full-height room-panel">
                        <div class="panel-header">
                            <p>{{ $room->name }}</p>
                        </div>
                        <div class="panel-content full-height">
                            <div class="messages">

                            </div>
                            <div class="message-box">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message', 'maxlength' => 200, 'rows' => 1, "onkeyup"=>"autoGrow(this)"]) }}
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('partials.right-sidebar')
            </div>
        </div>
    </div>
@endsection
