<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-lg mx-auto px-6 py-20">
        <h1 class="text-4xl font-bold text-center text-green-700 mb-4">Profile</h1>

        <form action="{{ route('no_sql_injection_level_one') }}" method="POST" class="bg-white p-10 rounded-xl shadow-md space-y-6">
            @csrf
            
            <div>
                <label for="user_name" class="block text-sm font-medium text-gray-700 mb-1">User</label>
                <input type="text" id="user_name" name="user_name" placeholder="Enter your user"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Log in
            </button>


            @if (!empty($errorMessage))
                <div class="mt-4 text-red-600 font-semibold text-center">
                    {{ $errorMessage }}
                </div>
            @endif
        </form>
    </div>
</body>
</html>
