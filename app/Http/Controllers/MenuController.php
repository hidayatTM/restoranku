<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Item;



class MenuController extends Controller
{

    public function index(Request $request)
    {


        $tableNumber = $request->query('meja');

        if ($tableNumber) {
            Session::put('table_number', $tableNumber);
        }

        $items = Item::where('is_active', 1)->orderBy('name', 'asc')->get();
        return view('customer.menu', compact('items', 'tableNumber'));
    }

    public function cart()
    {
        // $cart = Session::get('cart', []);
        $cart = Session::get('cart', []);
        return view('customer.cart', compact('cart'));
    }

    public function resetCart()
    {
        Session::forget('cart');
        return redirect()->route('cart');
    }

    public function addToCart(Request $request)
    {

        $data = $request->json()->all();
        $menuId = $request->input('id');

        if (!$menuId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Menu tidak ditemukan.',
            ], 400);
        }

        $menu = Item::find($menuId);
        if (!$menu) {
            return response()->json([
                'status' => 'error',
                'message' => 'Menu tidak ditemukan.',
            ], 404);
        }

        $img = $menu->img;

        if (!$img || !file_exists(public_path('img_item_upload/' . $img))) {
            $img = 'no-image.png';
        }


        $cart = Session::get('cart', []);

        if (isset($cart)) {
            if (isset($cart[$menuId])) {
                $cart[$menuId]['qty'] += 1;
            } else {
                $cart[$menuId] = [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'price' => $menu->price,
                    'img' => $menu->img,
                    'qty' => 1,
                ];
            }
        }

        Session::put('cart', $cart);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil ditambahkan ke keranjang',
            'cart' => $cart,
        ]);
    }
}
