@extends('layouts.app')

@section('content')

<!-- Hero Section with Company Name and Why Choose Us Section combined -->
<div class="py-16 text-center font-bold">
    <!-- Název firmy -->
    <h1 class="text-7xl  text-white mt-20 ">Pazuzu shop</h1>

    <!-- Why Choose Us Section -->
    <h2 class="text-4xl  text-gray-800 mt-20">Proč nakupovat u nás?</h2>
    <p class="mt-4 text-lg text-gray-600">Nabízíme nejlepší produkty za nejlepší ceny!</p>
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
        <!-- Rychlá Doprava -->
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300 relative text-black">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h3 class="text-xl text-gray-800">Rychlá Doprava</h3>
                <x-heroicon-o-truck height="80px" class="truck-icon my-4"/>
                <p class="text-gray-600">Zaručujeme rychlé dodání vašich objednávek.</p>
            </div>
        </div>
        <!-- Kvalitní Produkty -->
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300 text-black">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h3 class="text-xl  text-gray-800">Kvalitní Produkty</h3>
                <x-iconsax-bro-sidebar-right height="80px" class="my-4"/>
                <p class="text-gray-600">Naše produkty procházejí důkladným výběrem kvality.</p>
            </div>
        </div>
        <!-- Zákaznická Podpora -->
        <div class="bg-white shadow-xl rounded-lg p-8 transform hover:scale-105 transition-transform duration-300 text-black">
            <div class="flex flex-col items-center justify-center space-y-4">
                <h3 class="text-xl font-semibold text-gray-800">Zákaznická Podpora</h3>
                <x-gmdi-support-agent-o height="80px" class="my-4"/>
                <p class="text-gray-600">Jsme tu pro vás, abychom zodpověděli všechny vaše dotazy.</p>
            </div>
        </div>
    </div>
</div>

<!-- 3D Model Viewer Section -->
<div class="relative w-full h-screen flex justify-center items-center">
    <model-viewer 
        id="girlModelViewer"
        src="{{ asset('models/girl_model.glb') }}" 
        alt="Girl 3D Model" 
        auto-rotate
        camera-controls
        disable-zoom
        style="width: 80vw; height: 80vh; background: transparent; border-radius: 10px;">
    </model-viewer>
</div>

<!-- Products Horizontal Scroll Section -->
@include('components.product-slider');

<!-- Contact Form Section -->
@include('components.contact-form')

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

    // Add Scroll-based rotation effect to model
    let modelViewer = document.getElementById('girlModelViewer');

    window.addEventListener('scroll', () => {
        // Get the scroll position
        const scrollPosition = window.scrollY;
        // Adjust the rotation of the 3D model based on the scroll position (faster rotation)
        const rotation = scrollPosition * 0.3;  // Increased multiplier for faster rotation
        modelViewer.setAttribute('rotation', `${rotation}deg 0deg 0deg`);
    });
</script>
@endpush
