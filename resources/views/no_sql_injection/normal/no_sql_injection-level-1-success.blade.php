<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>You Are Logged In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    @if ($user)
    <div class="max-w-lg mx-auto px-6 py-20">
        <h1 class="text-4xl font-bold text-center text-green-700 mb-6">You are logged in</h1>

        <div class="bg-white p-10 rounded-xl shadow-md text-center space-y-6">
            <p class="text-lg text-gray-700">Welcome <b>{{ $user->user_name}} </b>! Your authentication was successful.</p>

            <a href="{{ url()->previous() }}"
               class="inline-block bg-green-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Go Back
            </a>
        </div>
    </div>
    @endif

</body>
</html>
