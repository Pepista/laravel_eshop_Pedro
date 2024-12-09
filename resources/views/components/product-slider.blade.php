<div class="py-16 bg-gray-100">
    <h2 class="text-4xl font-semibold text-center text-gray-800">Naše Produkty</h2>
    <div class="overflow-x-auto mt-8">
        <div class="flex space-x-6">
            @foreach($products as $product)
                <div class="flex-shrink-0 w-64 h-auto">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-all hover:shadow-xl transform hover:scale-105 h-full">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="object-cover w-full h-48 transition-transform duration-300 hover:scale-110">
                        <div class="p-6 h-full flex flex-col justify-between">
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
