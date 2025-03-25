@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto max-w-6xl mt-16"> <!-- Added mt-16 here -->
        <!-- Title -->
        <h1 class="text-4xl font-semibold text-center text-gray-800 mb-8">Nákupní Košík</h1>

        <!-- Back to Products Button -->
        <div class="text-center mb-4 mt-8">
            <a href="{{ route('products.index') }}" class="inline-block px-8 py-3 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                Zpět na produkty
            </a>
        </div>

        <!-- Check if Cart is Not Empty -->
        @if(session('cart') && count(session('cart')) > 0)
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto text-gray-800">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Produkt</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Cena</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Množství</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Celková cena</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold">Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $item)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 text-black">
                                <td class="px-6 py-4 text-sm font-medium">{{ $item['name'] }}</td>
                                <td class="px-6 py-4 text-sm">${{ $item['price'] }}</td>
                                <td class="px-6 py-4 text-sm">{{ $item['quantity'] }}</td>
                                <td class="px-6 py-4 text-sm">${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition duration-200 ease-in-out flex items-center space-x-2">
                                            <i class="fas fa-trash-alt"></i> 
                                            <span>Odstranit</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Checkout Button -->
            <div class="mt-8 flex justify-between items-center">
                <p class="text-lg font-semibold text-gray-800">
                    Celková cena: <span class="text-xl font-bold text-gray-900">${{ number_format(array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], session('cart'))), 2) }}</span>
                </p>
                <a href="{{ route('checkout.index') }}" class="inline-block px-8 py-4 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                    Přejít k pokladně
                </a>
            </div>
        @else
            <p class="text-center text-gray-800 text-xl mt-6">Váš košík je prázdný. Prohlédněte si naše produkty a přidejte něco do košíku!</p>
        @endif
    </div>
@endsection

<!-- Add these styles to improve the appearance -->
<style>
    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 1rem;
        text-align: left;
        font-size: 0.875rem;
        color: #4B5563; /* Dark Gray */
    }

    th {
        background-color: #3B82F6; /* Blue */
        color: white;
        font-weight: 600;
    }

    tr {
        transition: background-color 0.2s ease;
    }

    tr:hover {
        background-color: #f9fafb; /* Light Gray */
    }

    .btn-remove {
        display: flex;
        align-items: center;
        color: #EF4444; /* Red */
        transition: color 0.2s ease;
    }

    .btn-remove:hover {
        color: #DC2626; /* Darker Red */
    }

    /* Cart Total Styles */
    .cart-total {
        font-weight: 600;
        font-size: 1.25rem;
        text-align: right;
        color: #4B5563;
    }

    /* Button Styles */
    .btn-checkout, .btn-back {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-checkout:hover, .btn-back:hover {
        transform: translateY(-2px);
    }

    .btn-checkout:focus, .btn-back:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.4);
    }

    .btn-back {
        background-color: #2563EB; /* Blue */
    }

    .btn-checkout {
        background-color: #10B981; /* Green */
    }

    .btn-back {
        color: white;
    }

    .btn-checkout {
        color: white;
    }
</style>
