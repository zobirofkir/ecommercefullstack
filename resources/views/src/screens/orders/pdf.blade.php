<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .app-title {
            font-size: 2.5em;
            color: #2980b9;
            text-align: center;
            margin-bottom: 20px;
        }

        .user-info {
            font-size: 1.1em;
            margin: 10px 0;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .products-title {
            margin-top: 30px;
            font-size: 1.8em;
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
            font-size: 1.3em;
            padding: 10px;
            background-color: #e9f7fa;
            border: 1px solid #b2ebf2;
            border-radius: 5px;
        }

        .summary strong {
            color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1 class="app-title">{{ config('app.name') }}</h1>

        <div class="user-info">
            <p><strong>Name:</strong> {{ $user_name }}</p>
            <p><strong>Email:</strong> {{ $user_email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Address:</strong> {{ $address }}</p>
        </div>

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
                        <td>DH {{ number_format($product->product->prix, 2) }} * 1</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary">
            <p><strong>Total Amount:</strong> MAD {{ number_format($total, 2) }}</p>
        </div>
    </div>

</body>
</html>
