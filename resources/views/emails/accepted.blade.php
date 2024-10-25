<!DOCTYPE html>
<html>
<head>
    <title>Order Accepted</title>
</head>
<body>
    <h1>Your Order Has Been Accepted!</h1>
    <p>Thank you for your order, {{ $order->user->name }}.</p>
    <p>Here are the details of your accepted order:</p>

    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->product->title }} - Quantity: {{ $item->quantity }}</li>
        @endforeach
    </ul>

    <p>If you have any questions, feel free to contact us!</p>
</body>
</html>