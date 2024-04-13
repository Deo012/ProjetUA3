<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }
        .login-button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-right: 20px;
            cursor: pointer;
        }
        .login-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Bienvenue</h1>
            <a href="cataloge.php" class="login-button">Cataloge</a>
            <a href="login.php" class="login-button">Login</a>
            <a href="logout.php" class="login-button">Logout</a>
            
        </div>
    </header>

    <div class="container">
        <h2>Achat de voiture</h2>
    </div>
</body>
</html>
