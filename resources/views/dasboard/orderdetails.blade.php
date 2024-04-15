<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>

    <h2>Order Information:</h2>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Customer Name:</strong> {{ $order->full_name }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>Phone:</strong> {{ $order->phone }}</p>
    <p><strong>Total Bill:</strong> ${{ $order->bill }}</p>

    <h2>Order Products:</h2>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderProducts as $orderProduct)
                <tr>
                    <td>{{ $orderProduct->name }}</td>
                    <td>{{ $orderProduct->pivot->quantity }}</td>
                    <td>${{ $orderProduct->price }}</td>
                    <td>${{ $orderProduct->pivot->quantity * $orderProduct->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
