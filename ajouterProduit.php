
<?php
require 'functions.php';
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_POST);

if(isset($_POST["submit"])){
    echo"SUBMIT FONCTIONNE";
    addProduit($_POST["idProduit"], $_POST["nomProduit"], $_POST["urlImage"], $_POST["description"]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Form</title>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="text"], textarea, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"], .back {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover, .back {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Add Product</h2>
    <form action="ajouterProduit.php" method="post">
        <label for="idProduit">Id Produit:</label>
        <input type="number" name="idProduit" value="<?php echo @$_POST['idProduit'] ?>">

        <label for="nomProduit">Product Name:</label>
        <input type="text" name="nomProduit" value="<?php echo @$_POST['nomProduit'] ?>">

        <label for="urlImage">Image URL:</label>
        <input type="text" name="urlImage" value="<?php echo @$_POST['urlImage'] ?>">

        <label for="description">Description:</label>
        <textarea name="description" rows="4" value="<?php echo @$_POST['description'] ?>"></textarea>

        <input type="submit" name="submit" value="Add Product">
        <div class="back"><a href="cataloge.php">Retour</a></div>
    </form>
    
</body>
</html>
