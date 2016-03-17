@extends('layouts.main')


@section('page-title')
    Register User
@endsection


@section('main-content')
    <h2>Continue Registration</h2>
    {!! Form::open(array('url' => action('UserController@postRegisterContinue'), 'onsubmit' => 'return validateFields();')) !!}
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input type="hidden" name="user_id" id="user_id" readonly value="{{$id}}">
        <input class="mdl-textfield__input" type="text" name="email" id="email" readonly value="{{$email}}">
        <label class="mdl-textfield__label" for="email">Email</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input class="mdl-textfield__input" type="password" name="password" id="password">
        <label class="mdl-textfield__label" for="password">Password</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input class="mdl-textfield__input" type="password" name="password1" id="password1">
        <label class="mdl-textfield__label" for="password1">Re-type password</label>
    </div>
    <div class="error-message" id="password-error"></div>
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input class="mdl-textfield__input" type="text" name="first_name" id="first_name">
        <label class="mdl-textfield__label" for="email">First Name</label>
    </div>
    <div class="mdl-textfield mdl-js-textfield" style="width:100%;">
        <input class="mdl-textfield__input" type="text" name="last_name" id="last_name">
        <label class="mdl-textfield__label" for="last_name">Last Name</label>
    </div>
    <div style="text-align:right;">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">Complete Registration</button>
    </div>
    {!! Form::close() !!}
@endsection


@section('js-scripts')
    <script>
        function validateFields() {
            var password = $('#password').val();
            var password1 = $('#password1').val();
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            if (password.length < 4) {
                $('#password-error').html("Password must be four or more characters long.");
                return false;
            } else {
                $('#password-error').html("");
            }
            if (password != password1) {
                $('#password-error').html("Password does not match.");
                return false;
            }
            return true;
        }
    </script>
@endsection