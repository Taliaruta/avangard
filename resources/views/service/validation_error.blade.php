@if (isset($err_array) && is_array($err_array))
    <div class="bg-danger text-danger">
        @foreach ($err_array as $err)
            @if (is_array($err))
                @foreach ($err as $message)
                <div>{{ $message }}</div>
                @endforeach
            @else
            <div>{{ $err }}</div>
            @endif
        @endforeach
    </div>
@endif
