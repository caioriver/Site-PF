<?php
require_once "../Constructs/header.php";
if ($_SESSION['type-user'] != 'super') {
     header("Location: ../Principal/principal.php");
}
require_once "../../fun/_fixed.php";
$conect = db_connect();
$query_1 = "SELECT nome,debit FROM usuarios ORDER BY debit ASC LIMIT 5;";
$stmt_1 = $conect->prepare($query_1);
$stmt_1->execute();
?>

<link rel="stylesheet" type="text/css" href="../CSS/navbar_dashboard.css">
<link rel="stylesheet" type="text/css" href="../CSS/graph.css">
<link rel="stylesheet" type="text/css" href="../CSS/all.css">

<html>
<body>
    
    <!-- NAVBAR -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Mercadinho Gomes</h3>
                <strong>MG</strong>
            </div>            
            <ul class="list-unstyled components menuu">
                <div class="cordefundo">
                    <li class="active">
                        <a href="../Principal/principal.php">
                            Principal
                        </a>
                    </li>
                    <li>
                        <a href="../Usuarios/usuarios.php">
                            Usuários
                        </a>
                    </li>
                    <li>
                        <a href="../Requisicoes/requisicoes_CRUD.php">
                            Requisições
                        </a>
                    </li>
                    <li>
                        <a href="../Estoque/estoque_CRUD.php">
                            Estoque
                        </a>
                    </li>
                    <li>
                        <a href="../Sair/sair.php">
                            Sair
                        </a>
                    </li>  
                </div>
            </ul>            
        </nav>


        <!-- Começo da pagina -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                

                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info botaomenu">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                
                    <div class="title justify-content-center text-center">
                        <h1>Gráfico de Débitos</h1>
                    </div>

                </div>

            </nav>
            
            <section id="cards">
                <div id="chart_div"></div> <!-- Grafico -->
            </section>


            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {packages: ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawDualX);

                function drawDualX() {
                    
                    var data = google.visualization.arrayToDataTable([
                        
                        ['Usuarios', 'Debitos'],
                        <?php while($list_1 = $stmt_1->fetch(PDO::FETCH_ASSOC)): ?>
                        ['<?php echo($list_1['nome']); ?>',<?php echo $var = ($list_1['debit']*(-1)); echo($var);?>],
                        <?php endwhile; ?>
                        ]);

                    var materialOptions = {
                        chart: {
                        title: 'Usuários - Lista - maiores débitos'
                        },
                        hAxis: {
                        title: 'Total Population'
                        },
                        vAxis: {
                        title: 'City'
                        },
                        bars: 'horizontal',
                        series: {
                        1: {axis: '20'}
                        },
                        axes: {
                        x: {
                            20: {label: '2000 Population'}
                        }
                        }
                    };


                var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
                materialChart.draw(data, materialOptions);
                }
            </script>
            
    <?php
        require_once "../Constructs/footer.php"
    ?>
            
</body>
</html>

