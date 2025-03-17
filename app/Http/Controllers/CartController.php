<?php

// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Product; // Pokud chcete načítat produkty z databáze
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Zobrazení košíku
    public function index()
    {
        // Předpokládáme, že produkty jsou uloženy v session
        $cart = session()->get('cart', []);
        
        return view('cart.index', compact('cart'));
    }

    // Přidání produktu do košíku
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        // Pokud produkt již v košíku je, zvětšíme jeho množství
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Pokud produkt ještě není v košíku, přidáme ho
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
            ];
        }

        // Uložíme košík zpět do session
        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    // Odebírání produktu z košíku
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }
}
