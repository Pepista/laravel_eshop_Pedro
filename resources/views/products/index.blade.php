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
                    padding: 20px;
                }

                .product-card {
                    background-color: white;
                    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    overflow: hidden;
                    width: 100%;
                    max-width: 250px;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                    border: 1px solid #ddd; /* Okraj kolem každé karty */
                }

                .product-card:hover {
                    transform: translateY(-5px); /* Malý pohyb při hover */
                    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15); /* Zvýšení stínu při hover */
                }

                .product-card img {
                    width: 100%;
                    height: 200px;
                    object-fit: cover;
                    border-bottom: 2px solid #f4f4f4; /* Okraj mezi obrázkem a textem */
                }

                .product-card .product-description {
                    display: -webkit-box;
                    -webkit-line-clamp: 3;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                }

                .product-card .p-4 {
                    padding: 20px;
                }

                .product-card .text-center {
                    text-align: center;
                }

                .product-card h2 {
                    font-size: 1.25rem;
                    font-weight: 600;
                    color: #333;
                }

                .product-card p {
                    font-size: 0.95rem;
                    color: #777;
                    margin-bottom: 15px;
                }

                .product-card .font-bold {
                    font-size: 1.1rem;
                    color: #2c3e50;
                }

                .product-card .btn-primary,
                .product-card button {
                    padding: 10px 20px;
                    font-size: 1rem;
                    border-radius: 6px;
                    transition: background-color 0.3s ease;
                    width: 100%;
                    text-align: center;
                }

                .product-card .btn-primary {
                    background-color: #3498db;
                    color: white;
                    border: none;
                }

                .product-card .btn-primary:hover {
                    background-color: #2980b9;
                }

                .product-card button {
                    background-color: #2ecc71;
                    color: white;
                    border: none;
                    margin-top: 10px;
                }

                .product-card button:hover {
                    background-color: #27ae60;
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

                /* Styly pro potvrzovací okno */
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

                .confirmation-box .confirmation-content {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    text-align: center;
                    width: 80%;
                    max-width: 400px;
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                    animation: slideUp 0.4s ease;
                }

                .confirmation-box .confirmation-content p {
                    font-size: 1.1rem;
                    margin-bottom: 20px;
                    color: #333;
                }

                .confirmation-box .btn-container {
                    display: flex;
                    justify-content: center;
                    gap: 10px;
                }

                .confirmation-box button,
                .confirmation-box a {
                    padding: 10px 20px;
                    font-size: 1rem;
                    border-radius: 6px;
                    transition: background-color 0.3s ease;
                }

                .confirmation-box button {
                    background-color: #3498db;
                    color: white;
                    border: none;
                }

                .confirmation-box button:hover {
                    background-color: #2980b9;
                }

                .confirmation-box a {
                    background-color: #2ecc71;
                    color: white;
                    text-decoration: none;
                    display: inline-block;
                }

                .confirmation-box a:hover {
                    background-color: #27ae60;
                }

                /* Animace pro okno */
                @keyframes fadeIn {
                    from {
                        opacity: 0;
                    }
                    to {
                        opacity: 1;
                    }
                }

                @keyframes slideUp {
                    from {
                        transform: translateY(20px);
                        opacity: 0;
                    }
                    to {
                        transform: translateY(0);
                        opacity: 1;
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

    <!-- Potvrzovací boxy, které budou skryté a zobrazené pouze při kliknutí -->
    @foreach($products as $product)
        <div id="confirmation-box-{{ $product->id }}" class="confirmation-box">
            <div class="confirmation-content">
                <p>Chcete zůstat na stránce nebo přejít do košíku?</p>
                <div class="btn-container">
                    <!-- Form to stay on page and add item to cart -->
                    <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="POST" id="stay-form-{{ $product->id }}">
                        @csrf
                        <input type="hidden" name="stay" value="true">
                        <button type="submit" class="btn">Zůstat na stránce</button>
                    </form>

                    <!-- Link to go to cart page -->
                    <a href="{{ route('cart.index') }}" class="btn" onclick="addProductAndGoToCart({{ $product->id }})">Přejít do košíku</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection
