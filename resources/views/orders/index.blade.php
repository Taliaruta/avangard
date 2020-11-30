@extends('app')

@section('content')
    <h1>{{ $orders_type }} заказы ({{ $orders->count() }})</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название партнёра</th>
                <th>Стоимость заказа</th>
                <th>Наименование и состав заказа</th>
                <th>Статус заказа</th>
            </tr>
        </thead>
        <tbody>
            @include('orders.list', ['orders' => $orders])
        </tbody>
    </table>
    
@endsection
