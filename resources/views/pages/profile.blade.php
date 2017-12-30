@extends('layouts.base')

@section('content')
    <div class="profile">
        <div class="container-fluid">
            <div class="row">
                @include('partials.left-sidebar')

                <div class="col-md-6 col-md-offset-3 center-content">
                    {{-- Display information --}}
                    <div class="panel-group">
                        <div class="panel-header">
                            <p>Profile</p>
                        </div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="profile-img" style="background-image: url('../images/test2.jpg')"></div>
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

                    <div class="panel-group">
                        <div class="panel-content">
                            <ul class="nav nav-tabs">
                                @if (Auth::id() === $user->id)
                                    <li class="active">
                                        <a href="#edit-tab" data-toggle="tab">Edit Profile</a>
                                    </li>
                                    <li>
                                        <a href="#following-tab" data-toggle="tab">Following</a>
                                    </li>
                                @else
                                    <li class="active">
                                        <a href="#following-tab" data-toggle="tab">Following</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#followers-tab" data-toggle="tab">Followers</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                @if (Auth::id() === $user->id)
                                    {{-- USer profile editing tab --}}
                                    <div class="tab-pane active" id="edit-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if (session()->has('profile_message'))
                                                    <div class="alert green-background green">
                                                        {{ session()->get('profile_message') }}
                                                    </div>
                                                @endif
                                                {{-- Personal information --}}
                                                <form action="{{ route('user.update') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-6 {{ $errors->first('name') ? 'error' : '' }}">
                                                            <div class="form-group">
                                                                <label for="name">Name</label>
                                                                {{ Form::text('name', $user->name, ['class' => 'form-control', 'maxlength' => 50, 'required' => 'required']) }}
                                                            </div>
                                                            @if ($errors->first('name'))
                                                                <p class="red">{{ $errors->first('name') }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 {{ $errors->first('username') ? 'error' : '' }}">
                                                            <div class="form-group">
                                                                <label for="username">Username</label>
                                                                {{ Form::text('username', $user->username, ['class' => 'form-control', 'maxlength' => 30, 'required' => 'required']) }}
                                                            </div>
                                                            @if ($errors->first('username'))
                                                                <p class="red">{{ $errors->first('username') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 {{ $errors->first('email') ? 'error' : '' }}">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                {{ Form::text('email', $user->email, ['class' => 'form-control', 'maxlength' => 50, 'required' => 'required']) }}
                                                            </div>
                                                            @if ($errors->first('email'))
                                                                <p class="red">{{ $errors->first('email') }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6 {{ $errors->first('website') ? 'error' : '' }}">
                                                            <div class="form-group">
                                                                <label for="website">Website</label>
                                                                {{ Form::text('website', $user->website, ['class' => 'form-control', 'maxlength' => 50, 'placeholder' => '']) }}
                                                            </div>
                                                            @if ($errors->first('website'))
                                                                <p class="red">{{ $errors->first('website') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 {{ $errors->first('bio') ? 'error' : '' }}">
                                                            <div class="form-group">
                                                                <label for="bio">Short Description</label>
                                                                {{ Form::textarea('bio', $user->bio, ['class' => 'form-control', 'maxlength' => 200, 'rows' => 1, "onkeyup"=>"autoGrow(this)"]) }}
                                                            </div>
                                                            @if ($errors->first('bio'))
                                                                <p class="red">{{ $errors->first('bio') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if (session()->has('password_message'))
                                                    <div class="alert green-background green">
                                                        {{ session()->get('password_message') }}
                                                    </div>
                                                @endif
                                                <form action="{{ route('user.update.password') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="col-md-12 {{ $errors->first('password') ? 'error' : '' }}">
                                                            <div class="form-group">
                                                                <label for="current_password">Current Password</label>
                                                                {{ Form::password('current_password', ['class' => 'form-control', 'required' => 'required']) }}
                                                            </div>
                                                            @if ($errors->first('password'))
                                                                <p class="red">{{ $errors->first('password') }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row" id="new_password_group">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="new_password">New Password</label>
                                                                {{ Form::password('new_password', ['class' => 'form-control', 'required' => 'required', 'oninput="confirmPassword()"']) }}
                                                            </div>
                                                            <p>{{-- Populated with confirmation error --}}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="new_password_confirm">Confirm Password</label>
                                                                {{ Form::password('new_password_confirm', ['class' => 'form-control', 'required' => 'required', 'oninput="confirmPassword()"']) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <button class="btn" id="new_password_btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- Following users tab --}}
                                <div class="tab-pane {{ Auth::id() === $user->id ?: 'active' }}" id="following-tab">
                                    <div class="row">
                                        @forelse ($user->following as $user_following)
                                            <div class="col-md-6">

                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <p class="empty">{{ $user->id === Auth::id() ? 'You are not ' : 'This user isn\'t ' }} following anyone</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                                {{-- Followers tab --}}
                                <div class="tab-pane" id="followers-tab">
                                    <div class="row">
                                        @forelse ($user->followers as $follower)
                                            <div class="col-md-6">

                                            </div>
                                        @empty
                                            <div class="col-md-12">
                                                <p class="empty">{{ $user->id === Auth::id() ? 'You don\'t have any ' : 'This user does\'t have any ' }} followers</p>
                                            </div>
                                        @endforelse
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

@section('scripts')
    @parent

    <script type="text/javascript">
        // Change password confirmation
        function confirmPassword() {
            var $new_pass = $("[name='new_password']").val();
            var $new_pass_confirm = $("[name='new_password_confirm']").val();

            if ($new_pass !== $new_pass_confirm) {
                $('#new_password_group').addClass('error');
                $('#new_password_group p').html('Passwords do not match');
                $('#new_password_btn').prop('disabled', true);
            } else {
                $('#new_password_group').removeClass('error');
                $('#new_password_group p').html('');
                $('#new_password_btn').prop('disabled', false);
            }
        }

        @if (Auth::id() !== $user->id)
            function follower() {
                // TODO: ajax request
            }
        @endif
    </script>
@endsection
