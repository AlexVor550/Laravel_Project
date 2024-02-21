@foreach($orders as $order)
    <div>
        <h3>Заказ №{{ $order->id }}</h3>
        <p>Дата создания: {{ $order->created_at }}</p>
        <ul>
            @foreach($order->items as $item)
                <li>{{ $item->product->name }} ({{ $item->quantity }} шт.) - {{ $item->product->price * $item->quantity }} руб.</li>
            @endforeach
        </ul>
        
    </div>
@endforeach
