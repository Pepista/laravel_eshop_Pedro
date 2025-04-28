@extends('layouts.app')

@section('content')
<div class="container mt-20 px-4 sm:px-6 lg:px-8 mx-auto relative top-11 text-black">
    <!-- Product Details -->
    <div class="product-details bg-white p-10 shadow-xl rounded-lg mx-auto w-full sm:w-3/4 md:w-2/3 lg:w-1/2 mt-20 relative">
        <!-- Back Button -->
        <div class="absolute top-4 left-4">
            <a href="{{ route('products.index') }}" class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-semibold py-2 px-4 rounded-full shadow-md transition duration-300 transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Products
            </a>
        </div>

        <!-- Product Image -->
        <div class="text-center mb-10">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="product-image mx-auto w-full max-w-xl h-80 object-cover rounded-lg shadow-lg transform transition-all duration-500 hover:scale-105">
        </div>
        
        <!-- Product Information -->
        <h1 class="text-4xl font-semibold text-center text-gray-900 mb-6">{{ $product->name }}</h1>
        <p class="text-lg text-gray-700 text-center mb-6 leading-relaxed">{{ $product->description }}</p>

        <!-- Price and SKU -->
        <div class="flex justify-between text-lg font-medium text-gray-800 mb-6">
            <p><strong>Price: </strong>${{ number_format($product->price, 2) }}</p>
            <p><strong>SKU: </strong>{{ $product->sku }}</p>
        </div>

        <!-- Stock Information -->
        <div class="flex justify-between text-lg font-medium text-gray-800 mb-8">
            <p><strong>In Stock: </strong>{{ $product->in_stock }}</p>
        </div>

        <!-- Add to Cart Button -->
        <div class="mt-8 text-center">
            <button type="button" class="inline-block bg-green-600 hover:bg-green-700 text-white text-lg font-semibold py-3 px-8 rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105" onclick="showConfirmationBox('{{ route('cart.add', ['product' => $product->id]) }}', {{ $product->id }})">
                Add to Cart
            </button>
        </div>
    </div>
</div>
<div class="bg-gray-200 py-32 mt-12">
    
</div>
<div class="bg-gray-200 py-32 mt-12">
    
</div>
@endsection
