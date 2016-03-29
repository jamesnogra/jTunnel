@extends('layouts.main')


@section('page-title')
    Home
@endsection


@section('main-content')


    <div id="my-rookie-blogger-banner" style="width:940px;height:220px;position:relative;background-color:#B3D9FF;overflow:hidden;margin-bottom:5px;background-repeat: repeat-x;">
        <div id="rookie-blogger-title-container">
            The Rookie Blogger
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var bg_image = "http://www.james-tunnel.com/img/bg-blog.jpg";
            $('#my-rookie-blogger-banner').css("background-image", "url('"+bg_image+"')");
            var x = 0;
            setInterval(function(){
                x-=1;
                $('#my-rookie-blogger-banner').css('background-position', x + 'px 0');
            }, 10);
            $("#rookie-blogger-title-container").delay(2000).animate({"top": "95px"}, {duration: 1000, queue: true});
        });
    </script>

    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <style>
        #rookie-blogger-title-container {
            font-family: 'Pacifico', cursive;
            color: #006fb6;
            text-shadow:
                    3px 3px 0 #FFF,
                    -1px -1px 0 #FFF,
                    1px -1px 0 #FFF,
                    -1px 1px 0 #FFF,
                    1px 1px 0 #FFF;
            font-size: 52px;
            text-align: center;
            position: relative;
            top: -100px;
        }
    </style>


@endsection