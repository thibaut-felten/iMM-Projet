<?php
session_start();
if(!(isset($_SESSION['pseudo']))){
    $_SESSION['pseudo'] = "Invité";
}
if(!(isset($_SESSION['masse']))){
    $_SESSION['masse'] = "60";
}
if(!(isset($_SESSION['actiPhysique']))){
    $_SESSION['actiPhysique'] = "Normal";
}
require_once("src/head.php");
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">iMM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Dashboard</a>
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
    <div class="container mt-2">
        <div class="row">
            <h1>Bienvenue <?php echo $_SESSION['pseudo'];?></h1>
        </div>
    </div>

    <div class="container-fluid mt-2">
        <div class="row">
            <div id="cardChartCalorie" class="card cardChart">
                <div class="card-header">
                    Qunantité de calories ingérées
                </div>
                <div class="card-body">
                    <canvas id="chartCal"></canvas>
                </div>
            </div>
            <div id="cardChartSucre" class="card cardChart">
                <div class="card-header">
                    Quantité de sucre consommée
                </div>
                <div class="card-body">
                    <canvas id="chartSucre"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="cardChartSel" class="card cardChart">
                <div class="card-header">
                    Quantité de sel ingérée
                </div>
                <div class="card-body">
                    <canvas id="chartSel"></canvas>
                </div>
            </div>
            <div id="cardChartTypeAliments" class="card cardChart">
                <div class="card-header">
                    Types d'aliments consommés
                </div>
                <div class="card-body">
                    <canvas id="chartType"></canvas>
                </div>
            </div>
        </div>
    </div>
</body>

<script>new Chart(document.getElementById("chartCal"),{"type":"line","data":{"labels":["January","February","March","April","May","June","July"],"datasets":[{"label":"My First Dataset","data":[65,59,80,81,56,55,40],"fill":false,"borderColor":"rgb(255, 99, 132)","lineTension":0.1}]},"options":{}});
new Chart(document.getElementById("chartSel"),{"type":"line","data":{"labels":["January","February","March","April","May","June","July"],"datasets":[{"label":"My First Dataset","data":[65,59,80,81,56,55,40],"fill":false,"borderColor":"rgb(54, 162, 235)","lineTension":0.1}]},"options":{}});
new Chart(document.getElementById("chartSucre"),{"type":"line","data":{"labels":["January","February","March","April","May","June","July"],"datasets":[{"label":"My First Dataset","data":[65,59,80,81,56,55,40],"fill":false,"borderColor":"rgb(255, 205, 86)","lineTension":0.1}]},"options":{}});
new Chart(document.getElementById("chartType"),{"type":"doughnut","data":{"labels":["Viande","Légumes/Fruits","Féculents"],"datasets":[{"label":"My First Dataset","data":[300,50,100],"backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]}]}});
</script>

</html>