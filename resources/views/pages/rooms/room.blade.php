@extends('layouts.base')

@section('styles')
    @parent

    <link type="text/css" href="{{ asset('css/room.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="room">
        <div class="container-fluid">
            <div class="row">
                @include('partials.left-sidebar')

                <div class="col-md-9 col-md-offset-3 padd-fix">
                    <div class="panel-group room-panel">
                        <div class="panel-header">
                            <p>{{ $room->name }}</p>

                            <div class="dropdown">
                                <button class="fa-btn dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="fa fa-ellipsis-v" aria-hidden="true"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        @if ($room->creator_id === Auth::id())
                                            <a href="#">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                Room Settings
                                            </a>
                                        @endif
                                        <a href="#" class="leave">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                            Leave Room
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-content">
                            <div class="messages" id="messages">
                                @for ($i = 0; $i < 30; $i++)
                                    <div class="message">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <img src="{{ url('/images/test1.jpg') }}">
                                                <p class="message-name">{{ $i % 2 === 0 ? "Zachary Sluder" : "Rusty" }}</p>
                                                <p class="message-time">11:06 PM</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="message-content">{{ $i % 2 === 0 ? "you'll have to let me know if you do mc inyou'll have to let me know if you do mc in vryou'll have to let me know if you do mc in vryou'll have to let me know if you do mc in vr vr" : "this is the best message eva" }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="message-box">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            {{ Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message', 'maxlength' => 200, 'rows' => 1, 'placeholder' => 'Type Message']) }}
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
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        window.onload = function() {
            $('#messages').scrollTop($('#messages')[0].scrollHeight);
        }
    </script>
@endsection
