@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto">
        <div class="relative">
            <!-- Hlavní nadpis pro produkty -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-semibold text-white">Naše Produkty</h1>
            </div>

            <!-- Inline Style pro Grid -->
            <style>
                .product-grid {
                    display: grid;
                    grid-template-columns: repeat(5, 1fr);
                    grid-gap: 20px;
                    grid-auto-rows: minmax(300px, auto);
                    justify-items: center;
                }

                .product-card {
                    background-color: white;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    overflow: hidden;
                    width: 100%;
                    max-width: 250px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .product-card img {
                    width: 100%;
                    height: 200px;
                    object-fit: cover;
                }

                .product-card .product-description {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                @media (max-width: 768px) {
                    .product-grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }

                @media (max-width: 480px) {
                    .product-grid {
                        grid-template-columns: 1fr;
                    }
                }
            </style>

            <!-- Grid pro produkty -->
            <div class="product-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        <img src="https://via.placeholder.com/300" alt="{{ $product->name }}" class="product-image">
                        <div class="p-4 text-center">
                            <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-600 mb-4 product-description">
                                {{ $product->description }}
                            </p>
                            <p class="font-bold text-lg text-blue-600 mb-4">Cena: ${{ $product->price }}</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary inline-block px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 transition">Zobrazit detaily</a>

                            <!-- Add to Cart Button -->
                            <button type="button" class="inline-block px-6 py-2 mt-2 text-white bg-green-500 rounded-md hover:bg-green-600 transition" onclick="showConfirmationBox('{{ route('cart.add', ['product' => $product->id]) }}', {{ $product->id }})">Přidat do košíku</button>

                            <!-- Hidden confirmation box -->
                            <div id="confirmation-box-{{ $product->id }}" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50 hidden">
                                <div class="bg-white p-6 rounded-md text-center">
                                    <p>Chcete zůstat na stránce nebo přejít do košíku?</p>
                                    <div class="mt-4">
                                        <!-- Form to stay on page and add item to cart -->
                                        <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" id="stay-form-{{ $product->id }}">
                                            @csrf
                                            <input type="hidden" name="stay" value="true">
                                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Zůstat na stránce</button>
                                        </form>

                                        <!-- Link to go to cart page -->
                                        <a href="{{ route('cart.index') }}" class="px-4 py-2 bg-green-500 text-white rounded-md ml-2">Přejít do košíku</a>
                                    </div>
                                </div>
                            </div>
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

            // Skryjeme zbytek potvrzovacích boxů
            document.querySelectorAll('.confirmation-box').forEach(function(box) {
                if (box.id !== 'confirmation-box-' + productId) {
                    box.classList.add('hidden');
                }
            });

            // Když uživatel klikne na "Přejít do košíku"
            var goToCartLink = document.querySelector('#confirmation-box-' + productId + ' a');
            goToCartLink.onclick = function() {
                window.location.href = goToCartLink.href;
            };
        }
    </script>
@endsection
