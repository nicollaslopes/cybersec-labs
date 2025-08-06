<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Update</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <div class="max-w-md mx-auto px-6 py-20">
        <h1 class="text-3xl font-bold text-center mb-6">Registration Update</h1>

        <p class="text-center mb-6 text-gray-700 font-medium">
            You are logged as <span class="font-semibold text-green-600">admin@admin.com</span>
        </p>

        <form action="{{ route('csrf_level_one') }}" method="POST" class="bg-white p-8 rounded-lg shadow-lg">
            
            <div class="mb-6">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-sm font-semibold text-gray-700">password</label>
                <input type="password" id="password" name="password" placeholder="New password" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Submit
            </button>
        </form>
    </div>
</body>
</html>
