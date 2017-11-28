@extends('layouts.base')

@section('content')
    <div class="profile">
        <div class="container-fluid">
            <div class="row">
                @include('partials.left-sidebar')

                <div class="col-md-6 center-content">
                    {{-- Profile information --}}
                    <div class="panel-group">
                        <div class="panel-header">
                            <p>Profile</p>
                        </div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile-img-holder">
                                        <img src="{{ url('images/test1.jpg') }}" alt="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="username">{{ $user->username }}</p>
                                            <p class="name">{{ $user->name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="information">
                                                <p class="joined"><i class="fa fa-calendar-o" aria-hidden="true"></i> Joined {{ $user->created_at->format('M d, Y') }}</p>
                                                @if ($user->website)
                                                    <p class="website"><i class="fa fa-globe" aria-hidden="true"></i> <a href="{{ $user->website }}" target="_blank">{{ $user->website }}</a></p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <p class="bio">{{ $user->bio }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Information updating --}}
                    @if ($user->id === Auth::id())
                        <div class="panel-group">
                            <div class="panel-header">
                                <p>Update Profile</p>
                            </div>
                            <div class="panel-content">
                                @if (session()->has('profile_message'))
                                    <div class="alert green-background green">
                                        {{ session()->get('profile_message') }}
                                    </div>
                                @endif
                                <form action="{{ route('user.update', ['user' => $user]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6 {{ !$errors->first('name') ?: 'error' }}">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                {{ Form::text('name', $user->name, ['class' => 'form-control', 'maxlength' => 50, 'required' => 'required']) }}
                                            </div>
                                            @if ($errors->first('name'))
                                                <p>{{ $errors->first('name') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                {{ Form::text('username', $user->username, ['class' => 'form-control', 'maxlength' => 30, 'required' => 'required']) }}
                                            </div>
                                        </div>
                                        @if ($errors->first('username'))
                                            <p>{{ $errors->first('username') }}</p>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                {{ Form::text('email', $user->email, ['class' => 'form-control', 'maxlength' => 50, 'required' => 'required']) }}
                                            </div>
                                            @if ($errors->first('email'))
                                                <p>{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="website">Website</label>
                                                {{ Form::text('website', $user->website, ['class' => 'form-control', 'maxlength' => 50]) }}
                                            </div>
                                            @if ($errors->first('website'))
                                                <p>{{ $errors->first('website') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="bio">Short Description</label>
                                                {{ Form::textarea('bio', $user->bio, ['class' => 'form-control', 'maxlength' => 200, 'rows' => 1, "onkeyup"=>"autoGrow(this)"]) }}
                                            </div>
                                            @if ($errors->first('bio'))
                                                <p>{{ $errors->first('bio') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn accent-button">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        {{-- User password updating --}}
                        <div class="panel-group">
                            <div class="panel-header">
                                <p>Update Password</p>
                            </div>
                            <div class="panel-content">
                                @if (session()->has('password_message'))
                                    <div class="alert green-background green">
                                        {{ session()->get('password_message') }}
                                    </div>
                                @endif
                                <form action="{{ route('user.update.password', ['user' => $user]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="current_password">Current Password</label>
                                                {{ Form::password('current_password', ['class' => 'form-control', 'required' => 'required']) }}
                                            </div>
                                            @if ($errors->first('password'))
                                                <p>{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="new_password">New Password</label>
                                                {{ Form::password('new_password', ['class' => 'form-control', 'required' => 'required']) }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="btn accent-button">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        {{-- User latest --}}
                        <div class="profile-panel">
                            <div class="header">
                                <p class="profile-header">Latest Activity</p>
                            </div>
                            <div class="row">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9">

                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                @include('partials.right-sidebar')
            </div>
        </div>
    </div>
@endsection
