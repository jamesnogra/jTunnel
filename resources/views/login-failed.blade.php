@extends('layouts.main')


@section('page-title')
    Login User Failed
@endsection


@section('main-content')
    <h2>Login User Failed!</h2>
    <p>The email and password you entered does not match any of the registered users. Please <a href="{{action('UserController@login')}}">login</a> and try again.</p>
@endsection


@section('js-scripts')
    <script>

    </script>
@endsection