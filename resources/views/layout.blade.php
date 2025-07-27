<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini ECommerce Cart</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col min-h-screen bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Header -->
    <header class="bg-blue-800 text-white py-4 shadow">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold">Harsh Vardhan's Mini ECommerce</h1>
            <nav>
                <a href="{{ url('/') }}" class="mr-4 hover:underline">Products</a>
                <a href="{{ route('cart.index') }}" class="hover:underline">Cart</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto mt-8 px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; {{ date('Y') }} All Rights Reserved.
    </footer>

</body>
</html>
