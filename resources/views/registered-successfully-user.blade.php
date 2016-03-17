@extends('layouts.main')


@section('page-title')
    Registeration Successfuly
@endsection


@section('main-content')
    <h2>Registration Complete!</h2>
    <p>Your registration has been completed. Please <a href="{{action('UserController@login')}}">login</a>.</p>
@endsection


@section('js-scripts')
    <script>

    </script>
@endsection