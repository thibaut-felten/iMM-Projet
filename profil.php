<?php
session_start();

//On pourrait discuter des données par défaut, elles n'existeraient pas en cas d'appli multi-utilisateurs
if(!(isset($_SESSION['pseudo']))){
    $_SESSION['pseudo'] = "Invité";
}
if(!(isset($_SESSION['masse']))){
    $_SESSION['masse'] = "60";
}
if(!(isset($_SESSION['sexe']))){
    $_SESSION['sexe'] = "Homme";
}
if(!(isset($_SESSION['actiPhysique']))){
    $_SESSION['actiPhysique'] = "Normal";
}


if(isset($_POST['nom'])){
    $_SESSION['pseudo'] = $_POST['nom'];
}

if(isset($_POST['sexe'])){
    $_SESSION['sexe'] = $_POST['sexe'];
}
if(isset($_POST['masse'])){
    $_SESSION['masse'] = $_POST['masse'];
}
if(isset($_POST['physique'])){
    $_SESSION['actiPhysique'] = $_POST['physique'];
}
require_once("src/head.php");
?>

<body>
    <!-- Navbar -->
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
                    <a class="nav-link active" href="profil.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aliments.php">Aliments</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenu -->
    <div class="container-fluid mt-2">
        <div id="cardProfil" class="card">
            <div class="card-header">
                Profil
            </div>
            <div class="card-body">
                <form action="profil.php" method="post">
                    <div class="form-group row">
                        <label for="nom" class="col col-form-label">Pseudo</label>
                        <div class="col">
                            <input type="text" class="form-control" name="nom" placeholder="Mon pseudo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sexe" class="col col-form-label">Sexe</label>
                        <div class="col">
                            <select class="form-control" name="physique">
                                <option disabled selected hidden>Sélectionner</option>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="masse" class="col col-form-label">Masse</label>
                        <div class="col">
                            <select class="form-control" name="masse">
                                <option disabled selected hidden>Sélectionner</option>
                                <?php
                                    for ($i=30; $i < 121; $i++) { 
                                        echo "<option value=$i>$i</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="physique" class="col col-form-label">Activité physique</label>
                        <div class="col">
                            <select class="form-control" name="physique">
                                <option disabled selected hidden>Sélectionner</option>
                                <option value="Intense">Intense</option>
                                <option value="Normal">Normal</option>
                                <option value="Faible">Faible</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>