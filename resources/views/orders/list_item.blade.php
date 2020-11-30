<tr>
    <td>
        <a href="{{ route('orders.edit', ['order' => $order->id]) }}">{{ $order->id }}</a>
    </td>
    <td>{{ $order->partner->name }}</td>
    <td>{{ $order->price }}</td>
    <td>
        @if ($order->products->count() > 0)
            <ul>
                @foreach ($order->products as $product)
                    <li>{{ $product->name }}, {{ $product->pivot->quantity }} шт.</li>
                @endforeach
            </ul>
        @else
            Продуктов в заказе нет
        @endif
    </td>
    <td>{{ $order->status_name }}</td>
</tr>
