@extends('layout')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-center">Your Cart</h1>

@if($cart)
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded shadow-md">
            <thead>
                <tr>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700">Product</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700">Quantity</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700">Price</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700">Subtotal</th>
                    <th class="py-3 px-6 bg-gray-200 text-left text-sm font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $item)
                    <tr class="border-b">
                        <td class="py-4 px-6">{{ $item['name'] }}</td>
                        <td class="py-4 px-6">
                            <form method="POST" action="{{ route('cart.update') }}" class="flex items-center">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 text-center border rounded">
                                <button type="submit" class="ml-2 text-blue-600 hover:underline">Update</button>
                            </form>
                        </td>
                        <td class="py-4 px-6">${{ $item['price'] }}</td>
                        <td class="py-4 px-6">${{ $item['subtotal'] }}</td>
                        <td class="py-4 px-6">
                            <form method="POST" action="{{ route('cart.remove') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit" class="text-red-600 hover:underline">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center mt-6">
        <p class="text-xl font-bold">Grand Total: ${{ $grandTotal }}</p>
        <div>
            <form method="POST" action="{{ route('cart.clear') }}" class="inline-block mr-2">
                @csrf
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Clear Cart</button>
            </form>
            <form method="POST" action="{{ route('cart.checkout') }}" class="inline-block">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Checkout</button>
            </form>
        </div>
    </div>
@else
    <p class="text-center text-lg text-gray-600">Your cart is empty.</p>
@endif

<div class="text-center mt-8">
    <a href="{{ url('/') }}" class="inline-block bg-gray-800 text-white px-6 py-2 rounded hover:bg-black">
        Back to Products
    </a>
</div>
@endsection
