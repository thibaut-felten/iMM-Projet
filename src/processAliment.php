<?php
    session_start();
    if(isset($_POST['id_delete'])){
        $response = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/delete.php?id=".$_POST['id_delete']);
        $parse = json_decode($response,true);
        header("location : ../aliments.php");
    }

    if(isset($_POST['add'])){
        if(isset($_POST['nomAliment']) and isset($_POST['typeAliment']) and isset($_POST['caloriesAliment']) and isset($_POST['grasAliment']) and isset($_POST['sucreAliment']) and isset($_POST['proteineAliment']) and isset($_POST['selAliment'])){
            $response = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/create.php?nom=".$_POST['nomAliment']."&categorie=".$_POST['typeAliment']."%20aussi&energie=".$_POST['caloriesAliment']."&gras=".$_POST['grasAliment']."&sucre=".$_POST['sucreAliment']."&proteines=".$_POST['proteineAliment']."&sel=".$_POST['selAliment']);
            $parse = json_decode($response,true);
            header("location : ../aliments.php");
        }
        // On pourrait rajouter une alerte si on a le temps qui avertirait lorsqu'une donnée est manquante.
        // On devrait aussi vérifier que les données envoyées sont conformes à celles attendues
        // Pour l'instant on se dit que l'utilisateur ne rentre que des données conformes à celles attendues
    }

    if(isset($_POST['edit'])){
        if(isset($_POST['caloriesAliment']) and isset($_POST['grasAliment']) and isset($_POST['sucreAliment']) and isset($_POST['proteineAliment']) and isset($_POST['selAliment'])){
            $params = $_POST['edit']."%20aussi&energie=".$_POST['caloriesAliment']."&gras=".$_POST['grasAliment']."&sucre=".$_POST['sucreAliment']."&proteines=".$_POST['proteineAliment']."&sel=".$_POST['selAliment'];
            $response = file_get_contents("https://eden.imt-lille-douai.fr/~romain.reinert/api/update.php?id=".$params);
            $parse = json_decode($response,true);
            header("location : ../aliments.php");
            
        }
        // On pourrait rajouter une alerte si on a le temps qui avertirait lorsqu'une donnée est manquante.
        // On devrait aussi vérifier que les données envoyées sont conformes à celles attendues
        // Pour l'instant on se dit que l'utilisateur ne rentre que des données conformes à celles attendues
    }
    header("location: ../aliments.php");
?>