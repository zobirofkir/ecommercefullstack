<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }
        h1 {
            color: #333333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            font-size: 20px;
            color: #333333;
            margin-bottom: 10px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            border-bottom: 1px solid #e6e6e6;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .product-title {
            font-weight: bold;
            font-size: 16px;
            color: #333333;
        }
        .product-details {
            font-size: 14px;
            color: #666666;
        }
        .product-image {
            max-width: 100px;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }
        .total {
            font-size: 18px;
            font-weight: bold;
            color: #333333;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #999999;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Checkout Order Summary</h1>

        <h2>Products:</h2>
        <ul>
            @foreach($cartItems as $cartItem)
            <li>
                <div class="product-title">{{ $cartItem->product->title }}</div>
                <div class="product-details">
                    Price: ${{ number_format($cartItem->product->prix, 2) }}<br>
                    Subtotal: ${{ number_format($cartItem->product->prix * $cartItem->quantity, 2) }}<br>
                    Quantity: {{ $cartItem->quantity }}<br>
                    Category: {{ $cartItem->product->category->title }}<br>
                    <br>
                    <img src="{{ asset('storage/' . $cartItem->product->images[0]) }}" alt="" class="product-image">
                    <br>
                    Description: {{ $cartItem->product->description }}
                </div>
            </li>
            @endforeach
        </ul>

        <p class="total">Total: ${{ number_format($total, 2) }}</p>
    </div>

    <div class="footer">
        Thank you for shopping with us! If you have any questions, feel free to contact our support team.
    </div>
</body>
</html>
