@extends('layouts.base')

{{-- User registration/login --}}
@section('content')
    <div class="login">
        <div class="container">
            <div class="row">
                <p class="welcome-header">Welcome to {{ env('APP_NAME') }}</p>
                <p class="welcome-helper">Live message board and room chat</p>
            </div>
            <div class="row user-buttons">
                <div class="col-md-6">
                    <button class="btn primary-btn register-btn" data-toggle="collapse" data-target=".register-panel">Register</button>
                </div>
                <div class="col-md-6">
                    <button class="btn primary-btn login-btn" data-toggle="collapse" data-target=".login-panel">Login</button>
                </div>
            </div>

            {{-- Register panel --}}
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="collapse register-panel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="panel-header">Join {{ env('APP_NAME') }}</p>
                            </div>
                        </div>
                        <form action="{{ route('user.register') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name <span class="red">*</span></label>
                                        {{ Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50, 'required' => 'required', 'placeholder' => 'Name', 'autofocus'=>'autofocus']) }}
                                    </div>
                                    @if ($errors->first('name'))
                                        <p class="red">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username <span class="red">*</span></label>
                                        {{ Form::text('username', null, ['class' => 'form-control', 'maxlength' => 30, 'required' => 'required', 'placeholder' => 'Username']) }}
                                    </div>
                                    @if ($errors->first('username'))
                                        <p class="red">{{ $errors->first('username') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email <span class="red">*</span></label>
                                        {{ Form::text('email', null, ['class' => 'form-control', 'maxlength' => 50, 'required' => 'required', 'placeholder' => 'Email']) }}
                                    </div>
                                    @if ($errors->first('email'))
                                        <p class="red">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="red">*</span></label>
                                        {{ Form::password('password', ['class' => 'form-control', 'maxlength' => 200, 'required' => 'required', 'placeholder' => 'Password']) }}
                                    </div>
                                    @if ($errors->first('password'))
                                        <p class="red">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn secondary-btn">Join</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Login panel --}}
                    <div class="collapse login-panel">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="panel-header">Login to {{ env('APP_NAME') }}</p>
                            </div>
                        </div>
                        <form action="{{ route('user.login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="login">Username / Email <span class="red">*</span></label>
                                        {{ Form::text('login', null, ['class' => 'form-control test', 'maxlength' => 50, 'required' => 'required', 'placeholder' => 'Username', 'autofocus'=>'autofocus']) }}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password <span class="red">*</span></label>
                                        {{ Form::password('password', ['class' => 'form-control', 'maxlength' => 200, 'required' => 'required', 'placeholder' => 'Password']) }}
                                    </div>
                                </div>
                            </div>
                            @if ($errors->first('login'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="red">{{ $errors->first('login') }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn secondary-btn">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        window.onload = function() {
            // Only have one panel open
            $('.register-btn').click(function() {
                if ($('.login-panel').attr('aria-expanded', 'true')) {
                    $('.login-panel').attr('aria-expanded', 'false').removeClass('in');
                }
            });
            $('.login-btn').click(function() {
                if ($('.register-panel').attr('aria-expanded', 'true')) {
                    $('.register-panel').attr('aria-expanded', 'false').removeClass('in');
                }
            });

            // Expand panels for errors
            if ({{ json_encode($errors->count() > 0 && $errors->first('login')) }}) {
                $('.login-panel').attr('aria-expanded', 'true').addClass('in');
            } else if ({{ json_encode($errors->count() > 0) }}) {
                $('.register-panel').attr('aria-expanded', 'true').addClass('in');
            }
        }
    </script>
@endsection