@extends('layouts.app')

@section('content')
    <div class="container py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-center text-white mb-8">Nákupní Košík</h1>

        <!-- Odkaz na stránku s produkty (přesunutý o něco níže) -->
        <div class="text-center mb-4 mt-8"> <!-- Přidáno mt-8 pro větší prostor nahoře -->
            <a href="{{ route('products.index') }}" class="inline-block px-8 py-3 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300 ease-in-out">
                Zpět na produkty
            </a>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto text-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Produkt</th>
                            <th class="px-4 py-2">Cena</th>
                            <th class="px-4 py-2">Množství</th>
                            <th class="px-4 py-2">Celková cena</th>
                            <th class="px-4 py-2">Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $item)
                            <tr>
                                <td class="px-4 py-2">{{ $item['name'] }}</td>
                                <td class="px-4 py-2">${{ $item['price'] }}</td>
                                <td class="px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="px-4 py-2">${{ $item['price'] * $item['quantity'] }}</td>
                                <td class="px-4 py-2">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Odstranit</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <a href="{{ route('checkout.index') }}" class="inline-block px-6 py-2 text-white bg-green-500 rounded-md hover:bg-green-600 transition">Přejít k pokladně</a>
            </div>
        @else
            <p class="text-center text-white">Váš košík je prázdný.</p>
        @endif
    </div>
@endsection
