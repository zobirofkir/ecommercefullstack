<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            padding: 20px;
            color: #333;
        }

        .app-title {
            font-size: 2em;
            color: #2980b9;
            text-align: center;
            margin-bottom: 20px;
        }

        .user-info {
            font-size: 1.1em;
            margin: 10px 0;
        }

        .products-title {
            margin-top: 30px;
            font-size: 1.5em;
            color: #2c3e50;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 10px;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .products-table th, .products-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .products-table th {
            background-color: #2980b9;
            color: white;
            font-weight: bold;
        }

        .products-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .products-table tr:hover {
            background-color: #ddd;
        }

        .summary {
            margin-top: 20px;
            font-size: 1.2em;
        }

        .summary strong {
            color: #2980b9;
        }
    </style>
</head>
<body>

    <h1 class="app-title">{{ config('app.name') }}</h1>

    <p class="user-info"><strong>Name:</strong> {{ $user_name }}</p>
    <p class="user-info"><strong>Email:</strong> {{ $user_email }}</p>
    <p class="user-info"><strong>Phone:</strong> {{ $phone }}</p>
    <p class="user-info"><strong>Address:</strong> {{ $address }}</p>

    <h2 class="products-title">Products</h2>
    <table class="products-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ Str::limit($product->product->title, 50) }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ Str::limit($product->product->description, 50) }}</td>
                    <td>${{ number_format($product->product->prix, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="summary">
        <p><strong>Total Amount:</strong> ${{ number_format($total, 2) }}</p>
    </div>

</body>
</html>
