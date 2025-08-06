<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pentesting Lab</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <a href="{{ route('dashboard.show') }}">
            <h1>Pentesting Lab</h1>
            </a>
        </header>

        <section class="cards">
            @foreach ($vulns as $vuln)
            <div class="card">
                <h3>{{ $vuln->title }}</h3>
                <a href="{{ route('command_injection_details', [$vuln->type, $vuln->level]) }}">
                    <button class="card-button">Ver Detalhes</button>
                </a>
            </div>
            @endforeach
        </section>
    </div>
</body>
</html>
