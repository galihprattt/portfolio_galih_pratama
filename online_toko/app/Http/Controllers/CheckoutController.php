<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('order.checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        try {
            DB::table('orders')->insert([
                'name'         => $request->name,
                'email'        => $request->email,
                'address'      => $request->address,
                'phone'        => $request->phone,
                'items'        => json_encode($cart),
                'total_price'  => $total,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        } catch (\Exception $e) {
            dd('Insert gagal: ' . $e->getMessage());
        }

        session()->forget('cart');

        return redirect()->route('checkout.success')->with('success', 'Checkout Berhasil 🎉');
    }

    public function form()
    {
        $cart = session()->get('cart', []);
        return view('order.checkout', compact('cart'));
    }
}
