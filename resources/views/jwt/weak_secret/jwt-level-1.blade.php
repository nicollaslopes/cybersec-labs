<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>JWT Status</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: white;
            width: 380px;
            padding: 30px 25px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
            animation: fadeIn 0.8s ease;
        }

        h1 {
            margin-top: 0;
            font-size: 28px;
        }

        .success {
            color: #1cc88a;
        }

        .error {
            color: #e74a3b;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            background: #4e73df;
            color: white;
            transition: 0.3s ease;
        }

        .btn:hover {
            background: #2e59d9;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="card">
        @if ($isLogged)
            <h1 class="success">✔ Logged In</h1>
            <p>Your JWT token is valid. Welcome back!</p>
            <a href="#" class="btn">Continue</a>
        @else
            <h1 class="error">✖ Not Logged In</h1>
            <p>Your JWT token is missing or invalid.</p>
            <a href="#" class="btn">Go to Login</a>
        @endif
    </div>

</body>
</html>
