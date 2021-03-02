<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/4.4.0/font/octicons.min.css"/>

    <!-- Bootstrap CDN -->
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>--}}
<!-- Font Awesome CDN -->
{{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>--}}
<!-- Bootstrap-Iconpicker -->
    <link rel="stylesheet" href="dist/css/bootstrap-iconpicker.min.css"/>
    <title>Document</title>
    {{--<script--}}
            {{--src="https://code.jquery.com/jquery-3.5.1.js"--}}
            {{--integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="--}}
            {{--crossorigin="anonymous"></script>--}}
    <style>
        .resp-tabs-list {
            padding: 0px 0px 0 !important;
            display: flex;
            width: 100%;
            overflow: hidden;
            font-weight: 600;
        }
        .resp-tabs {
            border-left: none;
            border-right: none;
            border-top: none;
            margin: 0;
            text-transform: uppercase;
            line-height: normal;
            padding: 17px 20px 15px;
            border-bottom: 1px solid #eae4e4;
            font-style: normal;
            display: table-cell;
            width: 100%;
            text-align: center;
            list-style: none;
            cursor: pointer;
            color: rgb(141, 141, 141);
            float: left;
        }
        .resp-tab-content {
            opacity: 0;
            position: absolute;
        }
        .resp-tab-content-active {
            opacity: 1;
            z-index: 1;
            transition: 0.5s;
        }
        .resp-tabs-active {
            border-bottom: 1px solid {{$setting->color}} !important;
            color: {{$setting->color}};
            transition: 0.5s;
        }
        .resp-tabs-container{
            position: relative;
        }
        .aod_custom_tab.style1 {
            width: 500px;
            /* text-align: center; */
            margin: 0 auto;
            border: 1px solid #eae4e4;
            border-radius: 5px;
            padding: 0 7px;
            font-size: {{$setting->font_site}}px;
            background-color: {{$setting->background}};
            color: {{$setting->color}};
        }
    </style>
</head>
<body>
<div class="aod_custom_tab style1" style="width: 600px; padding: 0px">
    <ul class="resp-tabs-list">
        @foreach($navbars as $navbar)
            @if($navbar->status == 1)
                {{--chào--}}
            @else
                <li id=".nav-{{$navbar->id}}-tab" class="resp-tabs"><span><i class="{{$navbar->icon}}"></i>  {{$navbar->name}}</span></li>
            @endif
        @endforeach
    </ul>
    <div class="resp-tabs-container">
        @foreach($navbars as $navbar)
            <div class="resp-tab-content nav-{{$navbar->id}}-tab">
                <p>{!!$navbar->content!!}</p>
            </div>
        @endforeach
    </div>
    <script>
        $(function () {
            $(".resp-tabs").click(function (){
                $( ".resp-tabs" ).removeClass( "resp-tabs-active" );
                $(this).addClass( "resp-tabs-active" );
                $(".resp-tab-content").removeClass('resp-tab-content-active');
                $($(this).attr('id')).addClass('resp-tab-content-active');
            });
        })
    </script>

</div>
<!-- jQuery CDN -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Bootstrap CDN -->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap-Iconpicker Bundle -->
<script type="text/javascript" src="dist/js/bootstrap-iconpicker.bundle.min.js"></script>
</body>
</html>