<!DOCTYPE html>
<html>
    <head>
        <title>Liste des commandes</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php include("header.php"); ?>
        <?php require("class.php"); ?>

        <?php
        $sql = "SELECT * FROM commandes";
        $RSCommandes = $pdo->query($sql);
        if(!$RSCommandes){
            die("Echec de la requête :".$RSCommandes->errorInfo());
        }
        echo "Bonjour"; 

        ?>       

        <p>Salut</p>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>