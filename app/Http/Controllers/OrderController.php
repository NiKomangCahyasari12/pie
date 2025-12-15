<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $payment = $order->payments->last();
        $snapToken = '';

        if ($payment == null || $payment->status != 'paid') {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

            try {
                $snapToken = \Midtrans\Snap::getSnapToken([
                    'transaction_details' => [
                        'order_id' => $order->order_id,
                        'gross_amount' => $order->total_price,
                    ]
                ]);

                Payment::updateOrCreate(
                    ['order_id' => $order->id],
                    [
                        'amount' => $order->total_price,
                        'status' => 'pending',
                        'snapToken' => $snapToken,
                    ]
                );
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }

        return view('orders.show', compact('order', 'snapToken'));
    }
}
