<?php
    include 'functions.php';
    $result = getProduit();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }

        .card-img {
            width: 100%;
            height: auto;
        }

        .card-body {
            padding: 20px;
        }

        .card-body h4 {
            margin-top: 0;
        }

        .buttom-card {
            text-align: center;
        }

        .modifierProduit{
            background-color: darkcyan; 
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
        .modifierProduit:hover {
            background-color: cyan;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to Our Website</h1>
            <a href="cataloge.php" class="login-button">Cataloge</a>
            <a href="login.php" class="login-button">Login</a>
            
        </div>
    </header>
    <div class="grid">
        <?php
            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="card">
                        <img src="<?php echo $row["urlImage"]?>" alt="ImageProduit"  class="card-img">

                        <div class="card-body">
                            <h4><b><?php echo $row["nomProduit"]?></b></h4>
                            <p><?php echo $row["description"]?></p>
                            <div class="buttom-card">
                                <div class="modifierProduit"><a href="updateProduit.php?idProduit=<?php echo $row['idProduit'] ?>">Modifier</a></div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
        ?>

        <div class="card">
            <a href="ajouterProduit.php"><img src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Plus_symbol.svg" alt="plusImage" class="card-img"></a>
        </div>
    </div>
</body>
</html>