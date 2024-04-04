<?php
require "functions.php";

$response = "";
if(isset($_POST["submit"])){
    $response = registerUser($_POST["username"], $_POST["password"], $_POST["confirm_password"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .register-box {
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            position: relative;
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
        .success-banner{
            color: green;
        }
        .error-banner{
            color: red;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>Register</h2>

        <form action="register.php" method="post">
            <input type="text" name="username" placeholder="Username" value="<?php echo @$_POST["username"]; ?>">
            <input type="password" name="password" placeholder="Password" value="<?php echo @$_POST["password"]; ?>">
            <input type="password" name="confirm_password" placeholder="confirm_password" value="<?php echo @$_POST["confirm_password"]; ?>">
            <input type="submit" name="submit" value="Register">
        </form>

        <a href="login.php">Page de connexion</a>
        <?php
            if($response == "Succes"){
                ?>

                <p class="success-banner ">
                    Your registration was succesful
                </p>
                <?php
            }
            else{
                ?>

                <p class="error-banner">
                    <?php echo @$response; ?>
                </p>
                <?php
            }
        ?>
    </div>

    
    
</body>
</html>
