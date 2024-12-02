@extends('layouts.app')

@section('content')

<!-- Hero Section with Image and Gradient -->
<div class="relative h-screen mt-20 bg-gradient-to-b from-indigo-700 to-indigo-900">
    <img src="https://imgs.search.brave.com/ko2Q7ZOGLlqvLvF_YRANMCfq0u33Z5RmFO9DCe4WCQw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jZG4u/cHJvZC53ZWJzaXRl/LWZpbGVzLmNvbS81/YTllZTY0MTZlOTBk/MjAwMDFiMjAwMzgv/NjI4OWYwYmZhOTIw/YTk1OGYyYjQxNmY3/X2JsYWNrLWdyYWRp/ZW50LnBuZw" alt="Vítejte" class="object-cover w-full h-full opacity-70">
    <div class="absolute inset-0 bg-gradient-to-b from-black to-transparent opacity-50"></div>
    <div class="flex items-center justify-center h-full text-center">
        <h1 class="text-white text-6xl font-extrabold tracking-tight leading-tight">Vítejte na naší stránce!</h1>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="py-16 bg-gray-50 text-center">
    <h2 class="text-4xl font-semibold text-gray-800">Proč nakupovat u nás?</h2>
    <p class="mt-4 text-lg text-gray-600">Nabízíme nejlepší produkty za nejlepší ceny!</p>
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Rychlá Doprava</h3>
            <p class="mt-4 text-gray-600">Zaručujeme rychlé dodání vašich objednávek.</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Kvalitní Produkty</h3>
            <p class="mt-4 text-gray-600">Naše produkty procházejí důkladným výběrem kvality.</p>
        </div>
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300">
            <h3 class="text-xl font-semibold text-gray-800">Zákaznická Podpora</h3>
            <p class="mt-4 text-gray-600">Jsme tu pro vás, abychom zodpověděli všechny vaše dotazy.</p>
        </div>
    </div>
</div>

<!-- Products Horizontal Scroll Section -->
<div class="py-16 bg-gray-100">
    <h2 class="text-4xl font-semibold text-center text-gray-800">Naše Produkty</h2>
    <div class="overflow-x-auto mt-8">
        <div class="flex space-x-6">
            @foreach($products as $product)
                <div class="flex-shrink-0 w-64">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-all hover:shadow-xl transform hover:scale-105">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-48 transition-transform duration-300 hover:scale-110">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="mt-4 text-gray-500">{{ $product->description }}</p>
                            <p class="mt-4 font-bold text-gray-900">{{ number_format($product->price, 2) }} Kč</p>
                            <button class="mt-4 bg-indigo-600 text-white rounded-md px-6 py-2 hover:bg-indigo-700 transition duration-200">Koupit</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Contact Form Section -->
<div class="py-16 bg-white">
    <h2 class="text-4xl font-semibold text-center text-gray-800">Kontaktní formulář</h2>
    <form class="max-w-lg mx-auto mt-8 p-8 bg-white shadow-lg rounded-lg" action="#" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-700">Jméno</label>
            <input type="text" id="name" name="name" class="border border-gray-300 rounded-md w-full p-4 mt-2" required>
        </div>
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" id="email" name="email" class="border border-gray-300 rounded-md w-full p-4 mt-2" required>
        </div>
        <div class="mb-6">
            <label for="message" class="block text-sm font-medium text-gray-700">Zpráva</label>
            <textarea id="message" name="message" class="border border-gray-300 rounded-md w-full p-4 mt-2" required></textarea>
        </div>
        <button type="submit" class="bg-indigo-600 text-white rounded-md px-6 py-3 hover:bg-indigo-700 transition duration-200 w-full">Odeslat</button>
    </form>
</div>

@endsection

@push('scripts')
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@latest/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.mySwiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
        },
        loop: true, // Enable loop effect
    });
</script>
@endpush
