<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::simplePaginate(10);
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        return view('order.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'customer_address' => 'required|string|max:255',
            'orders' => 'required|string',
            'order_quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0'
        ]);

        $order = new Order();
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->orders = $request->orders;
        $order->order_quantity = $request->order_quantity;
        $order->total_price = $request->total_price;

        $order->save();

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'customer_address' => 'required|string|max:255',
            'orders' => 'required|string',
            'order_quantity' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0'
        ]);

        $order = Order::findOrFail($id);
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->orders = $request->orders;
        $order->order_quantity = $request->order_quantity;
        $order->total_price = $request->total_price;

        $order->save();

        return redirect()->route('order.index')->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }

    public function generatePDF()
    {
        $orders = Order::all();
        $pdf = PDF::loadView('reports.order', compact('orders'));

        return $pdf->download('orders_report.pdf');
    }
}

