<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

class FormController extends Controller
{
    public function submitOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Silakan lakukan login untuk melakukan pemesanan.');
        }

        // Validasi dan simpan pesanan
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*' => 'string',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1'
        ]);

        $order = new Order();
        $order->customer_name = $request->name;
        $order->customer_phone = $request->phone;
        $order->customer_address = $request->address;

        // Format products and quantities as a single array of objects
        $formattedOrders = [];
        $orderDetails = "";
        $totalQuantity = 0;
        foreach ($request->products as $product) {
            if (!isset($request->quantities[$product])) {
                continue;
            }
            $quantity = (int) $request->quantities[$product]; // Ensure quantity is an integer
            $formattedOrders[] = [
                'product' => $product,
                'quantity' => $quantity
            ];
            $orderDetails .= $product . " : " . $quantity . ", ";
            $totalQuantity += $quantity;
        }
        // Remove trailing comma and space
        $orderDetails = rtrim($orderDetails, ', ');
        $order->orders = $orderDetails;
        $order->order_quantity = $totalQuantity;

        // Calculate total price
        $totalPrice = 0;
        foreach ($formattedOrders as $orderItem) {
            $productPrice = config('product_prices.' . $orderItem['product']);
            if ($productPrice !== null) {
                $totalPrice += $orderItem['quantity'] * $productPrice;
            }
        }
        $order->total_price = $totalPrice;

        $order->save();

        // Store success message in session
        Session::flash('success', 'Pesanan Anda telah berhasil dilakukan.');

        // Generate WhatsApp URL and redirect
        $whatsappUrl = $this->generateWhatsAppUrl($request->name, $formattedOrders, $totalPrice);
        return redirect()->away($whatsappUrl . '#whatsapp');
    }

    protected function generateWhatsAppUrl($name, $orders, $totalPrice)
    {
        $adminPhoneNumber = '6285714210378'; // Ganti dengan nomor WhatsApp admin
        $message = "Halo admin, saya " . $name . "\n\n";
        $message .= "Saya ingin memesan:\n\n"; // Menambahkan teks "Saya ingin memesan"

        foreach ($orders as $order) {
            $message .= $order['product'] . " dengan jumlah " . $order['quantity'] . " kg\n";
        }
        $message .= "\nTotal harga: Rp " . number_format($totalPrice, 0, ',', '.');

        $whatsappUrl = "https://api.whatsapp.com/send?phone={$adminPhoneNumber}&text=" . urlencode($message);
        return $whatsappUrl;
    }


    public function afterWhatsApp()
    {
        if (Session::has('success')) {
            return redirect('/')->with('success', Session::get('success'));
        }

        return redirect('/');
    }
}
