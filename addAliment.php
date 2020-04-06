<?php
session_start();


require_once("src/head.php");
if(isset($_POST['id_edit'])){
    $alim = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/aliments.php?id=".$_POST['id_edit']);
    $toEdit = json_decode($alim, true)["result"]["aliments"][0];
    $energy = $toEdit["energy-kcal_100g"];
}
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
                Aliment à sauvegarder dans la base
            </div>
            <div class="card-body">
            <form action="src/processAliment.php" method="POST">
                <div class="form-group row">
                    <label for="nomAliment" class="col col-form-label">Nom </label>
                    <div class="col">
                        <?php 
                            if(isset($toEdit)){ echo $toEdit['product_name'];}
                            else{echo "<input class='form-control' name='nomAliment' id='nomAliment' placeholder='Nouveau nom' >";}
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="typeAliment" class="col col-form-label">Catégorie</label>
                    <div class="col">

                    <!-- A remplacer par un select -->

                        <?php
                            if(isset($toEdit)){echo $toEdit['pnns_groups_1'];}
                            else{echo "<input type='text' class='form-control' name='typeAliment' id='typeAliment' placeholder='Légumes/Viande...'>";}
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="caloriesAliment" class="col col-form-label">Energie (kcal)</label>
                    <div class="col">
                        <input type="text" class="form-control" name="caloriesAliment" id="caloriesAliment" <?php if(isset($toEdit["energy-kcal_100g"])){echo "value=$energy";}else{echo 'placeholder= "Valeur pour 100g"';}?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="grasAliment" class="col col-form-label">Matières grasses</label>
                    <div class="col">
                        <input type="text" class="form-control" name="grasAliment" id="grasAliment" <?php if(isset($toEdit['fat_100g'])){echo "value=$toEdit[fat_100g]";}else{echo 'placeholder= "Valeur pour 100g"';}?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sucreAliment" class="col col-form-label">Teneur en sucre</label>
                    <div class="col">
                        <input type="text" class="form-control" name="sucreAliment" id="sucreAliment" <?php if(isset($toEdit['sugars_100g'])){echo "value=$toEdit[sugars_100g]";}else{echo 'placeholder= "Valeur pour 100g"';}?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selAliment" class="col col-form-label">Teneur en sel</label>
                    <div class="col">
                        <input type="text" class="form-control" name="selAliment" id="selAliment" <?php if(isset($toEdit['salt_100g'])){echo "value=$toEdit[salt_100g]";}else{echo 'placeholder= "Valeur pour 100g"';}?>>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="proteineAliment" class="col col-form-label">Teneur en protéines</label>
                    <div class="col">
                        <input type="text" class="form-control" name="proteineAliment" id="proteineAliment" <?php if(isset($toEdit['proteins_100g'])){echo "value=$toEdit[proteins_100g]";}else{echo 'placeholder= "Valeur pour 100g"';}?>>
                    </div>
                </div>
                
                <button type="submit" <?php if(isset($_POST['id_edit'])){echo "name=edit value=$_POST[id_edit]";}else{echo "name=add";};?> class="btn btn-primary">Sauvegarder</button>
                    
                </div>
            </form>
            </div>
        </div>  
    </div>
    

</body>
        