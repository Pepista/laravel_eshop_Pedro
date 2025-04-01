<div class="py-16 bg-gray-100">
    <h2 class="text-4xl font-semibold text-center text-gray-900 mb-12">Naše Produkty</h2>
    <div class="overflow-x-auto mt-8">
        <div class="flex space-x-4 gap-4 overflow-x-scroll pb-8 text-black">
            @foreach($products as $product)
                <div class="flex-shrink-0 w-64 md:w-72 lg:w-80 h-auto">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-all transform hover:scale-105 hover:shadow-2xl h-full">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-48 md:h-56 lg:h-60 transition-transform duration-300 hover:scale-105">
                        <div class="p-6 h-full flex flex-col justify-between">
                            <h3 class="text-xl font-semibold text-gray-800 truncate hover:text-indigo-600 transition duration-200">{{ $product->name }}</h3>
                            <p class="mt-4 text-gray-600 text-sm md:text-base line-clamp-3">{{ $product->description }}</p>
                            <p class="mt-4 font-bold text-gray-900 text-lg">{{ number_format($product->price, 2) }} Kč</p>
                            <button class="mt-4 bg-indigo-600 text-white rounded-md px-6 py-2 hover:bg-indigo-700 transition duration-200 text-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Koupit</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Add these styles to improve the appearance -->
<style>
    /* Truncate and line clamp for text */
    .truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Scrollbar customizations */
    .overflow-x-auto::-webkit-scrollbar {
        height: 8px;
    }

    .overflow-x-auto::-webkit-scrollbar-thumb {
        background: #b3b3b3;
        border-radius: 4px;
    }

    .overflow-x-auto::-webkit-scrollbar-track {
        background: transparent;
    }

    /* Hover effects */
    .bg-white {
        transition: background-color 0.3s ease-in-out;
    }

    /* Responsiveness */
    @media (min-width: 768px) {
        .flex-shrink-0 {
            flex-shrink: 0;
        }
    }

    /* Additional design improvements */
    .overflow-x-auto {
        scrollbar-width: thin;
        scrollbar-color: #b3b3b3 transparent;
    }

    .hover\:scale-105:hover {
        transform: scale(1.05);
    }

    .hover\:shadow-2xl:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Button focus and hover effects */
    button:hover {
        background-color: #4c51bf;
    }

    button:focus {
        outline: 2px solid #4c51bf;
        outline-offset: 2px;
    }

    h3:hover {
        color: #4c51bf;
    }
</style>
