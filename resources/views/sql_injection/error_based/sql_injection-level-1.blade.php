<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="max-w-5xl mx-auto px-6 py-10">
        <h1 class="text-4xl font-bold mb-8 text-center">My cart</h1>

        <form method="GET" action="{{ route('sql_injection_level_one') }}" class="mb-8 flex flex-col md:flex-row gap-4">
            <input 
                type="text" 
                name="search" 
                placeholder="Search product..." 
                value="{{ request('search') }}"
                class="flex-1 p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300">

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
                Search
            </button>
        </form>
        @if (isset($products))
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                    @foreach($products as $product)
                        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
                            <h2 class="text-2xl font-semibold mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-700">{{ $product->description }}</p>
                            <img src="{{ $product->image_url }}" class="w-32 mt-4 rounded-md mx-auto" alt="{{ $product->name }}">
                        </div>
                    @endforeach
                
            </div>

            @if(count($products) === 0)
                <p class="text-center text-gray-500 mt-10">Nenhum produto encontrado.</p>
            @endif
        @endif
    </div>
    @if (isset($error_message))
        {{ $error_message }}
    @endif

</body>
</html>
