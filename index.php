<?php
require_once("src/head.php");
?>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">iMM</a>
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
                    <a class="nav-link" href="#">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aliments.php">Aliments</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid mt-2">
        <div id="cardJournal" class="card">
            <div class="card-header">
                Calories
            </div>
            <div class="card-body">
                <canvas id="chartCal"></canvas>
            </div>
        </div>
    </div>
</body>

<script>new Chart(document.getElementById("chartCal"),{"type":"line","data":{"labels":["January","February","March","April","May","June","July"],"datasets":[{"label":"My First Dataset","data":[65,59,80,81,56,55,40],"fill":false,"borderColor":"rgb(75, 192, 192)","lineTension":0.1}]},"options":{}});</script>
<script src="src/script.js"></script>
</html>