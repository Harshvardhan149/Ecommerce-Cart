@extends('layout')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-center">Our Products</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($products as $product)
        <div class="bg-white rounded shadow-md hover:shadow-xl p-6 flex flex-col items-center">
            <h2 class="text-xl font-semibold mb-2">{{ $product['name'] }}</h2>
            <p class="text-gray-700 mb-4">Price: ${{ $product['price'] }}</p>
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}">
                <input type="hidden" name="name" value="{{ $product['name'] }}">
                <input type="hidden" name="price" value="{{ $product['price'] }}">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    Add to Cart
                </button>
            </form>
        </div>
    @endforeach
</div>

<div class="text-center mt-8">
    <a href="{{ route('cart.index') }}" class="inline-block bg-gray-800 text-white px-6 py-2 rounded hover:bg-black">
        View Cart
    </a>
</div>
@endsection
