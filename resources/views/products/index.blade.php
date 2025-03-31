@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto mt-16"> <!-- Added mt-16 for space between navigation and content -->
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
                                {{ Str::limit($product->description, 100) }} <!-- Truncates the description for better UI -->
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

    <script>
        // Funkce pro zobrazení potvrzovacího boxu
        function showConfirmationBox(productUrl, productId) {
            // Zobrazíme potvrzovací box pro daný produkt
            document.getElementById('confirmation-box-' + productId).classList.remove('hidden');
            document.getElementById('confirmation-box-' + productId).style.display = 'flex';

            // Skryjeme zbytek potvrzovacích boxů
            document.querySelectorAll('.confirmation-box').forEach(function(box) {
                if (box.id !== 'confirmation-box-' + productId) {
                    box.style.display = 'none';
                }
            });
        }

        // Funkce pro přidání produktu do košíku a přesměrování na košík
        function addProductAndGoToCart(productId) {
            // Poslat AJAX požadavek pro přidání do košíku
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
                    // Přejít na košík
                    window.location.href = "{{ route('cart.index') }}";
                }
            });
        }
    </script>

    <!-- Potvrzovací boxy -->
    @foreach($products as $product)
        <div id="confirmation-box-{{ $product->id }}" class="confirmation-box fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 hidden justify-center items-center">
            <div class="confirmation-content bg-white p-6 rounded-lg shadow-md text-center w-4/5 md:w-1/3">
                <p class="text-lg text-gray-800 mb-4">Chcete zůstat na stránce nebo přejít do košíku?</p>
                <div class="btn-container flex justify-center gap-4">
                    <!-- Stay on page -->
                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" class="inline-block">
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

<!-- Additional Styles -->
<style>
    /* Grid Styles for responsiveness */
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    /* Card Hover Effect */
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    /* Hover Effects for Buttons */
    .product-card button:hover, .confirmation-box button:hover {
        transform: translateY(-2px);
        background-color: #27ae60;
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
</style>
