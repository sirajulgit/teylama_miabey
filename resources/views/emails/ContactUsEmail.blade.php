<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        /* Inline styles for simplicity, consider using CSS classes for larger templates */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 200px;
        }

        .message {
            padding: 20px;
            background-color: #ffffff;
        }

        .message p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        
        <div class="message">
            @if (!empty($name))
                <p><strong>Name:</strong> {{ $name }}</p>
            @endif

            @if (!empty($email))
                <p><strong>Email:</strong> {{ $email }}</p>
            @endif

            @if (!empty($phone))
                <p><strong>Phone:</strong> {{ $phone }}</p>
            @endif

            @if (!empty($user_message))
                <p>{{ $user_message }}</p>
            @endif
            
        </div>
        
    </div>
</body>

</html>