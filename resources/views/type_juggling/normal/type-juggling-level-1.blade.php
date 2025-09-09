<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Validate API Key</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body class="bg-gray-50 text-gray-800">

    <div class="max-w-lg mx-auto px-6 py-20">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-6">Validate API Key</h1>

        <div class="bg-white p-10 rounded-xl shadow-md space-y-6">
            <div>
                <label for="api_key" class="block text-sm font-medium text-gray-700 mb-1">API Key</label>
                <input type="text" id="api_key" name="api_key" placeholder="Enter your API key"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button id="validate_button"
                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Validate API Key
            </button>

            <div id="response_message" class="mt-4 text-center font-semibold">(This lab will work on PHP < 8.0)</div>
        </div>
    </div>

</body>
</html>

<script>
    $(document).ready(function(){
        $('#validate_button').click(function(e){
            e.preventDefault();

            const data = {
                api_key: $('#api_key').val(),
            }

            const json_data = JSON.stringify(data) 

            $.ajax({
                url: "{{ route('type_juggling_validate_api_level_one') }}",
                type: "POST",
                data: json_data,
                success: function (res) {
                    $('#response_message')
                        .removeClass("text-red-600 text-green-600")
                        .addClass(res.valid ? "text-green-600" : "text-red-600")
                        .text(res.message);
                },
                error: function () {
                    $('#response_message')
                        .removeClass("text-green-600")
                        .addClass("text-red-600")
                        .text("Something went wrong.");
                }
            })
        })
    })
</script>
