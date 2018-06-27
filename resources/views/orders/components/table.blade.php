<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Партнер</th>
        <th>Стоимость заказа</th>
        <th>Наименование состав заказа</th>
        <th>Статус заказа</th>
        <th>Дата заказа</th>
    </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td><a href="/orders/edit/{{ $order->id }}">{{ $order->id }}</a></td>
            <td>{{ $order->partner->name }}</td>
            <td>{{ $order->calculateCost() }}</td>
            <td>
                @foreach($order->products as $product)
                    {{ $product->name }}<br>
                @endforeach
            </td>
            <td>{{ $order->statusTitle }}</td>
            <td>{{ \Carbon\Carbon::parse($order->delivery_dt)->format('d-m-Y H:i') }}</td>
        </tr>
    @endforeach

    </tbody>
</table>