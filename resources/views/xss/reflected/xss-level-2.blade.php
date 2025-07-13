<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pentesting Lab</title>
    <link rel="stylesheet" href="{{ asset('css/xss/reflected/xss-level-2.blade.css') }}">
</head>

<body>
    <div class="form-container">
        @if(request()->isMethod('get') && isset($name))
            @if ($success)
                <div class="success">
                    <div class="submitted-values">
                        <p><strong>Hello, {!! $name !!}! Your data has been sent!</strong></p>
                    </div>
                </div>
            @else
                <div class="error">
                    <div class="submitted-values">
                        <p><strong>Tag script is not allowed!</strong></p>
                    </div>
                </div>
            @endif
        @endif

        <h2>Form</h2>
        <form method="GET" action="{{ route('xss_reflected_level_two') }}">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Your description..." required></textarea>

            <button type="submit">Send</button>
        </form>
    </div>
</body>

</html>