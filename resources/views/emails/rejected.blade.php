<!DOCTYPE html>
<html>
<head>
    <title>Order Rejected</title>
</head>
<body>
    <h1>Your Order Has Been Rejected</h1>
    <p>Dear {{ $order->user->name }},</p>
    <p>We regret to inform you that your order has been rejected. Here are the details:</p>

    <ul>
        @foreach ($order->orderItems as $item)
            <li>{{ $item->product->title }} - Quantity: {{ $item->quantity }}</li>
        @endforeach
    </ul>

    <p>If you have any questions, please do not hesitate to contact us.</p>
</body>
</html>