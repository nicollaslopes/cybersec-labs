<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ping Host</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="max-w-xl mx-auto px-6 py-20">
        <h1 class="text-4xl font-bold mb-10 text-center">Ping Host</h1>

        <form method="POST" class="flex flex-col gap-4 items-center">
            @csrf
            <input 
                type="text" 
                name="host" 
                value="{{request('host')}}"
                placeholder="Enter host or IP..." 
                class="w-full p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300">

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700 transition">
                Ping
            </button>
        </form>

        @if (isset($ping) && $ping != null)
            <div class="mt-10 bg-white p-6 rounded shadow">
                <h2 class="text-xl font-semibold mb-4">Resultado:</h2>
                <pre class="bg-gray-100 p-4 rounded text-sm overflow-x-auto text-gray-800 whitespace-pre font-mono">
                    {{ $ping }}
                </pre>
            </div>
        @endif

        @if (isset($error_message))
            <p class="text-center text-red-500 mt-4">{{ $error_message }}</p>
        @endif
    </div>

</body>
</html>
