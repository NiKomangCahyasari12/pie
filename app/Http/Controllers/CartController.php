<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;


class CartController extends Controller
{
    public function index()
    {
        // Ambil semua item di cart untuk user yang sedang login
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        // Hitung jumlah item di cart
        $cartCount = $cartItems->sum('quantity');

        return view('cart.index', compact('cartItems', 'cartCount'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Tambahkan ke cart
        $cart = Cart::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
            ],
            [
                'quantity' => $request->input('quantity', 1), 
                'total_price' => Product::find($request->product_id)->price * $request->input('quantity', 1),
            ]
        );

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        // Update item di cart
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->total_price = $cartItem->product->price * $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }
    
    public function checkout()
{
    $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Cart is empty');
    }

    $totalPrice = $cartItems->sum(fn($item) => $item->total_price);

    $order = Order::create([
        'order_id' => 'ORD' . rand(10000, 99999),
        'user_id' => Auth::id(),
        'total_price' => $totalPrice,
        'status' => 'pending',
        'payment_status' => 'unpaid',
    ]);

    foreach ($cartItems as $item) {
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $item->product_id,
            'quantity' => $item->quantity,
            'price' => $item->product->price,
        ]);
    }

    Cart::where('user_id', Auth::id())->delete();

    return redirect()->route('orders.index')
        ->with('success', 'Order berhasil dibuat. Silakan lakukan pembayaran.');
}


}
