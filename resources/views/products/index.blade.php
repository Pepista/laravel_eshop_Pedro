<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto mt-20">
        <h1 class="text-3xl font-semibold text-center mb-8 text-white">Naše Produkty</h1>
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
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-card">
                    <img src="https://via.placeholder.com/300" alt="{{ $product->name }}" class="product-image">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2 text-center">{{ $product->name }}</h2>
                        <p class="text-gray-600 mb-4 product-description">
                            {{ $product->description }}
                        </p>
                        <p class="font-bold text-lg text-blue-600 mb-4 text-center">Cena: ${{ $product->price }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary inline-block px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 transition">Zobrazit detaily</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('components.product-slider');
@endsection