

@forelse ($orders as $order)
    @include('orders.list_item', ['order' => $order])
@empty
    Заказов нет
@endforelse
