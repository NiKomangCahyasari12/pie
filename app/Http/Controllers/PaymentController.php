<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\MidtransService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function midtransCallback()
    {
     \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        $notif = new \Midtrans\Notification();
        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;

        # dapatkan order id
        $orderId = $notif->order_id;

        $order = Order::where('invoice_number', $orderId)->first();
        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($transaction == 'capture') {
            if ($fraud == 'accept') {
                $this->updateOrderStatus($order, 'paid', $notif);
            }
        } else if ($transaction == 'cancel') {
            $this->updateOrderStatus($order, 'canceled', $notif);
        } else if ($transaction == 'deny') {
            $this->updateOrderStatus($order, 'failed', $notif);
        } else if ($transaction == 'settlement') {
            $this->updateOrderStatus($order, 'paid', $notif);
        }
    }

    protected function updateOrderStatus(Order $order, string $status, $notif)
    {
        $order->update(['status' => $status]);

        Payment::updateOrCreate(
            ['order_id' => $order->id],
            [
                'amount' => $notif->gross_amount,
                'status' => $status,
                'payment_date' => in_array($status, ['paid', 'settlement']) ? now() : null
            ]
        );
    }
}
