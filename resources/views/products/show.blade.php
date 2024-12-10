<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="h-20"> </div>
    <div class="container mt-20 px-4 sm:px-6 lg:px-8 mx-auto relative top-11">
        <!-- Back Button (Přesunuto doleva nahoře) -->
        <div class="fixed top-10 left-6 z-50">
            <a href="{{ route('products.index') }}" class="btn btn-secondary bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-md">
                Back to Products
            </a>
        </div>

        <!-- Product Details (Posunuto trochu dolů) -->
        <div class="product-details bg-white p-6 shadow-lg rounded-lg mx-auto w-full sm:w-2/3 md:w-1/2 lg:w-1/3 mt-20 top-11">
            <!-- Product Image (Zmenšeno a centrováno) -->
            <div class="text-center mb-6">
                <img src="https://via.placeholder.com/600" alt="{{ $product->name }}" class="product-image mx-auto w-2/3 h-64 object-cover rounded-lg">
            </div>
            
            <!-- Product Information -->
            <h1 class="text-3xl font-semibold text-center text-gray-800 mb-4">{{ $product->name }}</h1>
            <p class="text-lg text-gray-600 mb-4">{{ $product->description }}</p>
            <div class="flex justify-between text-lg font-medium text-gray-800">
                <p><strong>Price: </strong>${{ $product->price }}</p>
                <p><strong>SKU: </strong>{{ $product->sku }}</p>
            </div>
            <div class="flex justify-between text-lg font-medium text-gray-800 mt-2">
                <p><strong>In Stock: </strong>{{ $product->in_stock }}</p>
            </div>
        </div>
    
    </div>
    
@endsection