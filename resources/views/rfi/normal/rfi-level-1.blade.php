<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pentesting Lab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-4xl mx-auto py-10 px-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center text-blue-600">HR Portal</h1>
        <div class="mb-6 flex justify-center space-x-4">
            <a href="{{ route('rfi_level_one', ['page' => 'contact.php']) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Contact us</a>
        </div>
        <div class="mt-10 text-sm text-center text-gray-400">
            <p>Welcome to our HR Portal! You can see more details on the "About us" page.</p>
        </div>
    </div>
</body>
</html>
