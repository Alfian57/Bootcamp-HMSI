<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .invoice-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            margin: 0;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice-details th,
        .invoice-details td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .invoice-summary {
            text-align: right;
            margin-top: 20px;
        }

        .invoice-summary h2 {
            margin: 0;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
        }

        .status.unpaid {
            background-color: #f39c12;
        }

        .status.paid {
            background-color: #27ae60;
        }

        .status['being shipped'] {
            background-color: #3498db;
        }

        .status.completed {
            background-color: #2ecc71;
        }

        .status.cancelled {
            background-color: #e74c3c;
        }
    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice</h1>
        </div>
        <div class="invoice-details">
            <table>
                <tr>
                    <th>Purchase ID</th>
                    <td>{{ $purchase->id }}</td>
                </tr>
                <tr>
                    <th>Purchase Time</th>
                    <td>{{ $purchase->purchase_time }}</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>Rp {{ number_format($purchase->total_price, 2) }}</td>
                </tr>
                <tr>
                    <th>Total Weight</th>
                    <td>{{ $purchase->total_weight }} kg</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><span class="status {{ $purchase->status }}">{{ ucfirst($purchase->status) }}</span></td>
                </tr>
            </table>
        </div>
        <div class="invoice-details">
            <h2>Items</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($purchase->purchaseItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->total_price, 2) }}</td>
                            <td>{{ $item->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="invoice-summary">
            <h2>Total: Rp {{ number_format($purchase->total_price, 2) }}</h2>
        </div>
    </div>
</body>

</html>
