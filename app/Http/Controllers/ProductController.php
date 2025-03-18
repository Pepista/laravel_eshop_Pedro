<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Return the 'index' view with the products data
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        // Return the 'create' view where the user can add a new product
        return view('products.create');
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
        ]);

        // Create the product in the database
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_url' => $request->image_url,
        ]);

        // Redirect to the products index with a success message
        return redirect()->route('products.index')->with('success', 'Produkt byl úspěšně přidán.');
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($id);

        // Return the 'show' view with the product data
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($id);

        // Return the 'edit' view with the product data
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image_url' => 'nullable|url',
        ]);

        // Retrieve the product by its ID
        $product = Product::findOrFail($id);

        // Update the product's details in the database
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image_url' => $request->image_url,
        ]);

        // Redirect to the products index with a success message
        return redirect()->route('products.index')->with('success', 'Produkt byl úspěšně aktualizován.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product from the database
        $product->delete();

        // Redirect to the products index with a success message
        return redirect()->route('products.index')->with('success', 'Produkt byl úspěšně odstraněn.');
    }

    /**
     * Search for products by name.
     */
    public function search(Request $request)
    {
        // Get the search query from the request
        $query = $request->input('query');

        // Search for products whose name contains the query (case insensitive)
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        // Return the 'index' view with the filtered products data
        return view('products.index', compact('products'));
    }
}
