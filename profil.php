<?php
require_once("src/head.php");
?>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">iMM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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
                <form>
                    <div class="form-group row">
                        <label for="nom" class="col col-form-label">Pseudo</label>
                        <div class="col">
                            <input type="text" class="form-control" id="nom" placeholder="Mon pseudo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="masse" class="col col-form-label">Masse</label>
                        <div class="col">
                            <select class="form-control" id="masse">
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
                            <select class="form-control" id="physique">
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