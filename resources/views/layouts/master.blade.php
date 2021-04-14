<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <title>Books</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>
    <div>
        @include('partials.menu')
    </div>
    <div>
        <div>
            @yield('content')
        </div>
    </div>
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/confirm.js')}}"></script>
    @endsection
</body>

</html>