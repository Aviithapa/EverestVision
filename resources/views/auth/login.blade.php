@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row login-container animated fadeInUp">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="col-md-7 col-md-offset-2 tiles white no-padding">
                <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
                    <h2 class="normal">
                        Sign in to {{ config('app.site_name') }}
                    </h2>
                </div>
                <div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
                    <div>
                        <form class="animated fadeIn validate" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            @if(isset($requestData['school_program_id']))
                            <input type="hidden" name="school_program_id" value="{{$requestData['school_program_id']}}">
                            @endif
                            <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" id="login_username" name="user_name" placeholder="Email"
                                           type="text" value="{{ old('user_name') }}" required autofocus>
                                    @if ($errors->has('active'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('active') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" id="login_pass" name="password" placeholder="Password"
                                           type="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                                <div class="control-group col-md-12 col-lg-12">
                                    <div class="checkbox checkbox check-success">
                                        <a href="{{ route('password.request') }}">Forgot password!</a>&nbsp;&nbsp;
                                        <input id="checkbox1" type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox1">Keep me reminded</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
{{--                <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">--}}
{{--                    <h2 class="normal">--}}
{{--                        New to {{ config('app.site_name') }}?--}}
{{--                    </h2>--}}
{{--                    <p class="p-b-20">--}}
{{--                        Sign up Now! for {{ config('app.site_name') }} accounts, it's free..--}}
{{--                    </p>--}}


{{--                    --}}{{--<a data-toggle="modal" href="#register-modal" class="btn btn-info btn-cons" title="Register" id="js-register-button">--}}
{{--                        --}}{{--Register--}}
{{--                    --}}{{--</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    @include('partials.modal.register')

    @push('scripts')
        @if(request()->has('register'))
            <script>
                $('#js-register-button').trigger('click');
            </script>
        @endif
    @endpush

@endsection