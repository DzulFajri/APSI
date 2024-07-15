<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background-color: #f7fafc;
            color: #2d3748;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            text-align: left;
        }
        th {
            background-color: #0D98BA;
            color: #f7fafc;
        }
        tbody tr:nth-child(odd) {
            background-color: #edf2f7;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center; margin-bottom: 20px;">Order Report</h1>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Orders</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->customer_address }}</td>
                    <td>{{ $order->customer_phone }}</td>
                    <td>{{ $order->orders }}</td>
                    <td>{{ $order->order_quantity }}</td>
                    <td>Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
