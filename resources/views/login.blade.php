@extends('layouts.main')


@section('page-title')
    Login User
@endsection


@section('main-content')
    <h2>Login</h2>
    {!! Form::open(array('url' => action('UserController@login'), 'onsubmit' => 'return validateForm();')) !!}
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input class="mdl-textfield__input" type="text" name="email" id="email">
        <label class="mdl-textfield__label" for="email">Email</label>
    </div>
    <div class="error-message" id="email-error"></div>
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input class="mdl-textfield__input" type="password" name="password" id="password">
        <label class="mdl-textfield__label" for="password">Password</label>
    </div>
    <div class="error-message" id="password-error"></div>
    <div style="text-align:right;">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">Login</button>
    </div>
    {!! Form::close() !!}
@endsection


@section('js-scripts')
    <script>
        function validateForm() {
            var email = $('#email').val();
            var password = $('#password').val();
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(email)) {
                $("#email-error").html("Must be a valid email.");
                return false;
            } else {
                $("#email-error").html("");
            }
            if (password.length < 4) {
                $('#password-error').html("Password must be four or more characters long.");
                return false;
            } else {
                $('#password-error').html("");
            }
            return true;
        }

    </script>
@endsection