
<?php
    require 'functions.php';

    $reponse = "";
    echo "Form submitted\n";
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    var_dump($_POST);
    
    
    if(isset($_POST['submit'])){
        
        $reponse = loginUser($_POST['username'], $_POST['password']);
        echo $reponse;

        if(isset($_SESSION['redirect_url'])){
            $redirect_url = $_SESSION['redirect_url'];
            unset($_SESSION['redirect_url']);
            header("Location: $redirect_url");
            exit();
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .login-box {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .closeLogin{
            color: red;
        }
        .closeLogin:hover{
            cursor: pointer;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="closeLogin"> <a href="index.php">X</a> </div>
        <h2>Login</h2>

        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" value="<?php echo @$_POST['username'] ?>">
            <input type="password" name="password" placeholder="Password" value="<?php echo @$_POST['password'] ?>">
            <input type="submit" name="submit" value="Login">
        </form>

        <a href="register.php">Cree un compte</a>
        <p class = "error"><?php echo @$reponse; ?></p>
    </div>

</body>
</html>
