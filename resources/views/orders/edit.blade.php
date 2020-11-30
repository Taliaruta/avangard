@extends('app')

@section('content')
    <h1>Редактирование заказа {{ $order->id }}</h1>
    <br>
    <form method="post">
        {{ csrf_field() }}
        <div class="form-group row{{ $errors->has('client_email*') ? ' has-error' : '' }}">
            <label for="client_email" class="col-sm-3 control-label">Email клиента</label>
            <div class="col-sm-9">
                <input type="email" name="client_email" class="form-control" id="client_email" value="{{ old('client_email') ?? $order->client_email }}" required>
                @if ($errors->has('client_email*'))
                    @include('service.validation_error', ['err_array' => $errors->get('client_email*')])
                @endif
            </div>
        </div>
        <div class="form-group row{{ $errors->has('partner_id*') ? ' has-error' : '' }}">
            <label for="partner_id" class="col-sm-3 control-label">Партнер</label>
            <div class="col-sm-9">
                <select name="partner_id" class="form-control" id="partner_id" required>
                    @foreach ($partners as $partner)
                        <option value="{{ $partner->id }}"{{ old('partner_id') && old('partner_id') == $partner->id ? ' selected' : (! old('partner_id') && $partner->id == $order->partner_id ? ' selected' : '') }}>{{ $partner->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('partner_id*'))
                    @include('service.validation_error', ['err_array' => $errors->get('partner_id*')])
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="control-label col-sm-3 pt-0">Продукты</label>
                <div class="col-sm-9">
                    @if ($order->products->count() > 0)
                        <ul>
                            @foreach ($order->products as $product)
                                <li>{{ $product->name }}, {{ $product->pivot->quantity }} шт.</li>
                            @endforeach
                        </ul>
                    @else
                        Продуктов в заказе нет
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group row{{ $errors->has('status*') ? ' has-error' : '' }}">
            <label for="status" class="col-sm-3 control-label">Статус</label>
            <div class="col-sm-9">
                <select name="status" class="form-control" id="status">
                    @foreach ($order->statuses as $status => $status_name)
                        <option value="{{ $status }}"{{ $status == $order->status ? ' selected' : '' }}>{{ $status_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('status*'))
                    @include('service.validation_error', ['err_array' => $errors->get('status*')])
                @endif
            </div>
        </div>
        <div class="form-group row">
            <label for="status" class="col-sm-3 control-label">
                Стоимость заказа
            </label>
            <div class="col-sm-9">
                {{ $order->price }}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-9 col-sm-offset-3">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>
    </form>
    
@endsection
