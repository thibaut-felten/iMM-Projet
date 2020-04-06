<?php
session_start();


require_once("src/head.php");
if(isset($_POST['id_edit'])){
    $conso = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/consommations.php?id_conso=".$_POST['id_edit']);
    $toEdit = json_decode($conso, true)["result"]["consommation"][0];
}
$aliments = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/aliments.php");
$alim = json_decode($aliments,true);
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">iMM</a>
        <div class="navbar" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="journal.php">Journal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aliments.php">Aliments</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header">
                Consommation à sauvegarder dans la base
            </div>
            <div class="card-body">
            <form action="src/processConso.php" method="POST">
                <div class="form-group row">
                    <label for="idAliment" class="col col-form-label">Consommation</label>
                    <div class="col">
                        <?php 
                            echo "<select class='form-control' name='nomAliment' id='nomAliment' >";                     
                            echo "<option disabled hidden>Sélectionner</option>";
                            foreach($alim["result"]["aliments"] as $al){
                                echo "<option value=$al[id_aliment]>$al[product_name]</option>";
                            }
                            echo "</select>";
                            
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="quantiteConso" class="col col-form-label">Quantité (g)</label>
                    <div class="col">
                        <input type="text" class="form-control" name="quantiteConso" id="quantiteConso" <?php if(isset($toEdit['quantite'])){echo "value=$toEdit[quantite]";}else{echo "placeholder= 'Quantité'";}?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="dateConso" class="col col-form-label">Date (yyyy-mm-dd)</label>
                    <div class="col">
                        <input type="text" class="form-control" name="dateConso" id="dateConso" <?php if(isset($toEdit['dateConso'])){echo "value=$toEdit[dateConso]";}else{echo 'placeholder= "Date"';}?>>
                    </div>
                </div>
                
                <button type="submit" <?php if(isset($_POST['id_edit'])){echo "name=editConso value=$_POST[id_edit]";}else{echo "name=addConso";};?> class="btn btn-primary">Sauvegarder</button>
                    
                </div>
            </form>
            </div>
        </div>  
    </div>
    

</body>
        