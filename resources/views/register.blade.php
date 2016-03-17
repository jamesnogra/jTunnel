@extends('layouts.main')


@section('page-title')
    Register User
@endsection


@section('main-content')
    <h2>Register</h2>
    {!! Form::open(array('url' => action('UserController@register'), 'onsubmit' => 'return validateEmail();')) !!}
        <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
            <input class="mdl-textfield__input" type="text" name="email" id="email">
            <label class="mdl-textfield__label" for="email">Email</label>
        </div>
        <div class="error-message" id="email-error"></div>
        <div style="text-align:right;">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">Register</button>
        </div>
    {!! Form::close() !!}
@endsection


@section('js-scripts')
    <script>
        function validateEmail() {
            var temp_email = $('#email').val();
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(temp_email)) {
                $("#email-error").html("Must be a valid email.");
                return false;
            }
            $("#email-error").html("");
            return true;
        }
    </script>
@endsection