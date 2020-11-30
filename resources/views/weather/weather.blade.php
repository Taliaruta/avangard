@extends('app')

@section('content')
    @if ($widget)
        {!! $widget !!}
    @endif
    
    <a class="weatherwidget-io" href="https://forecast7.com/ru/53d2634d42/bryansk/" data-label_1="Погода" data-label_2="в Брянске" data-theme="weather_one" >Погода в Брянске</a>
    <script>
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>

@endsection
