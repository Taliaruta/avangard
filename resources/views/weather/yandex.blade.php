<div class="row weather-line">
    <div class="col-md-3">
        <a href="https://yandex.ru/pogoda/bryansk" target="_blank"><img src="/images/yweather-logo.svg" alt=""></a>
    </div>
    <div class="col-md-3"><h3 class="m-0"><a href="https://yandex.ru/pogoda/bryansk" target="_blank">Погода в Брянске</a></h3></div>

    <div class="col-md-3">Сейчас {{ $clima->fact->temp ?? '-' }}°C (ощущается как {{ $clima->fact->feels_like ?? '-' }}°C)</div>
    <div class="col-md-3">
        Завтра {{ $clima->forecast->parts[1]->temp_min ?? '-' }}@if ($clima->forecast->parts[1]->temp_max !== $clima->forecast->parts[1]->temp_min)-{{ $clima->forecast->parts[1]->temp_max ?? '-' }}@endif°C (ночью {{ $clima->forecast->parts[0]->temp_min ?? '-' }}@if ($clima->forecast->parts[0]->temp_max !== $clima->forecast->parts[0]->temp_min)-{{ $clima->forecast->parts[0]->temp_max ?? '-' }}°C)@endif
    </div>
</div>

{{-- dd($clima) --}}
