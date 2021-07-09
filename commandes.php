<?php include("header.php") ?>
<?php include("class.php") ?>
    <?php 
            $sql = "SELECT * FROM cmd_pdt WHERE Cmd_Pdt_ID=".$_GET['id'];
            $commandes = $pdo->query($sql);
            if (!$commandes){
                die("Echec de la requête !".$commandes->errorInfo());
            }
            
    ?>
    <div class="container">
        <h2>Commande N°<?php echo $commandes['Cmd_Pdt_ID'] ?></h2>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($commandes as $donnees){
                $sql = "SELECT Cmd_Pdt_Commande_ID FROM cmd_pdt ORDER BY DESC";
                $ordre = $pdo->query($sql);
            ?>
            <tr>
                <th scope="row"><?php echo $donnees['Cmd_Pdt_Commande_ID']; ?></th>
                <td><?php echo $donnees['Commande_Date']; ?></td>
                <td><?php echo $donnees['Commande_Client_ID']; ?></td>
                <td><?php echo $RSNom['Produit_Nom']; ?></td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
<?php include("footer.php") ?>