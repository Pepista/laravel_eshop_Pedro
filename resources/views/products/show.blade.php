@extends('layouts.app')

@section('content')
<div class="h-20"></div>
    <div class="container mt-20 px-4 sm:px-6 lg:px-8 mx-auto relative top-11">
        <!-- Back Button -->
        <div class="fixed top-10 left-6 z-50">
            <a href="{{ route('products.index') }}" class="inline-flex items-center bg-gradient-to-r from-indigo-600 to-indigo-700 hover:from-indigo-700 hover:to-indigo-800 text-white font-semibold py-3 px-6 rounded-full shadow-xl transition duration-300 transform hover:scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Products
            </a>
        </div>

        <!-- Product Details -->
        <div class="product-details bg-white p-10 shadow-xl rounded-lg mx-auto w-full sm:w-3/4 md:w-2/3 lg:w-1/2 mt-32">
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

        <!-- Confirmation Box -->
        <div id="confirmation-box-{{ $product->id }}" class="confirmation-box fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden justify-center items-center">
            <div class="confirmation-content bg-white p-6 rounded-lg shadow-md text-center w-4/5 md:w-1/3">
                <p class="text-lg text-gray-800 mb-4">Do you want to continue shopping or go to your cart?</p>
                <div class="btn-container flex justify-center gap-4">
                    <!-- Stay on page -->
                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="inline-block">
                        @csrf
                        <input type="hidden" name="stay" value="true">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">Stay on Page</button>
                    </form>

                    <!-- Go to Cart -->
                    <a href="{{ route('cart.index') }}" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300" onclick="addProductAndGoToCart({{ $product->id }})">Go to Cart</a>
                </div>
            </div>
        </div>

    </div>
@endsection

<!-- Additional Scripts -->
<script>
    // Function to show the confirmation box
    function showConfirmationBox(productUrl, productId) {
        document.getElementById('confirmation-box-' + productId).classList.remove('hidden');
        document.getElementById('confirmation-box-' + productId).style.display = 'flex';

        // Hide other confirmation boxes
        document.querySelectorAll('.confirmation-box').forEach(function(box) {
            if (box.id !== 'confirmation-box-' + productId) {
                box.style.display = 'none';
            }
        });
    }

    // Function to add product to cart and redirect to cart
    function addProductAndGoToCart(productId) {
        fetch("{{ route('cart.add', '') }}/" + productId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ product_id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = "{{ route('cart.index') }}";
            }
        });
    }
</script>

<!-- Additional Styles -->
<style>
    /* Background Gradient for the Page */
    body {
        background: linear-gradient(to top right, #e6f7ff, #f3e5f5);
        min-height: 100vh;
    }

    /* Confirmation Box Styling */
    .confirmation-box {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease;
    }

    .confirmation-content button {
        font-size: 1rem;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Hover Effects for Buttons */
    .confirmation-box button:hover {
        transform: translateY(-2px);
        background-color: #27ae60;
    }
</style>
