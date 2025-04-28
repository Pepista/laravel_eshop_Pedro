@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto mt-16">
        <div class="relative">
            <!-- Hlavní nadpis pro produkty -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-semibold text-gray-800">Naše Produkty</h1>
            </div>

            <!-- Grid pro produkty -->
            <div class="product-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-4 text-black">
                @foreach($products as $product)
                    <div class="product-card bg-white rounded-lg shadow-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-48 transition-transform duration-300 hover:scale-110">
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-600 mb-4 product-description">
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            <p class="font-bold text-lg text-blue-600 mb-4">Cena: {{ number_format($product->price, 2) }} Kč</p>
                            <a href="{{ route('products.show', $product->id) }}" class="inline-block px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 transition duration-300">Zobrazit detaily</a>
                            
                            <!-- Add to Cart Button -->
                            <button type="button" class="mt-2 inline-block px-6 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 transition duration-300" onclick="showConfirmationBox('{{ route('cart.add', ['product' => $product->id]) }}', {{ $product->id }})">Přidat do košíku</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Potvrzovací boxy -->
    @foreach($products as $product)
        <div id="confirmation-box-{{ $product->id }}" class="confirmation-box hidden">
            <div class="confirmation-content">
                <p class="text-lg text-gray-800 mb-4">Chcete zůstat na stránce nebo přejít do košíku?</p>
                <div class="btn-container">
                    <!-- Stay on page -->
                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="stay" value="true">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300">Zůstat na stránce</button>
                    </form>

                    <!-- Go to Cart -->
                    <a href="{{ route('cart.index') }}" class="px-6 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-300" onclick="addProductAndGoToCart({{ $product->id }})">Přejít do košíku</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script>
        function showConfirmationBox(productUrl, productId) {
            // Show confirmation box
            document.getElementById('confirmation-box-' + productId).classList.remove('hidden');
            document.getElementById('confirmation-box-' + productId).style.display = 'flex';

            // Hide other confirmation boxes
            document.querySelectorAll('.confirmation-box').forEach(function(box) {
                if (box.id !== 'confirmation-box-' + productId) {
                    box.style.display = 'none';
                }
            });
        }

        function addProductAndGoToCart(productId) {
            // AJAX request to add product to cart
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
                    // Redirect to cart
                    window.location.href = "{{ route('cart.index') }}";
                }
            });
        }
    </script>
@endsection
