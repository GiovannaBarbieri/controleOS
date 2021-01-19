<?php 
require_once '../controller/ChamadoCTRL.php';
require_once '../controller/UtilCtrl.php';

UtilCtrl::VerTipoPermissao(1);
$ctrl = new ChamadoCTRL();
$dados = $ctrl->ResultadoGrafico();



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once '_head.php'; ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once '_topo.php';
            include_once '_menu.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Página Inicial</h2>   
                        </div>
                    </div>
                    <hr />
                    <div id="graficoinicial"></div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Qtd Atual", {role: "style"}],
                    ["Aguardando atendimento", <?= $dados[0]['qtd_aguarde'] ?> , "red"],
                    ["Em atendimento", <?= $dados[0]['qtd_atendimento'] ?> , "orange"],
                    ["Finalizado", <?= $dados[0]['qtd_finalizado'] ?> , "green"]
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"},
                    2]);

                var options = {
                    title: "Situação atual dos atendimentos",
                    width: 1050,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: {position: "none"},
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("graficoinicial"));
                chart.draw(view, options);
            }
        </script>
    </body>
</html>

