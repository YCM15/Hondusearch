<?php 
        session_start();
if (isset($_SESSION["sesion"])) {
    $nivel = $_SESSION["sesion"]["nivel"];
    if($nivel == 2){
        header("location: ../cliente/");
    }else if($nivel == 1){
        header("location: ../desarrollador/");
    }
} else {
    header("location: ../");
}
 ?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HonduSherch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="../css/desarollador.css">
</head>
<body> 

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark border-bottom border-info">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="../">Hondusearch</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav nav-tabs" style="border:none;" id="myTab" role="tablist"">

			  <li class="nav-item" role="presentation">
			    <button class="nav-link btn bg-dark active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Mis datos</button>
			  </li>
			  <li class="nav-item " role="presentation">
			    <button class="nav-link btn bg-dark" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" onclick="Estadisticas();">Estadisticas</button>
			  </li>

	      </ul>
	      	<div class="btn-group">
			  <a type="button" class="btn btn-primary dropdown-toggle" id="usuario" data-bs-toggle="dropdown" aria-expanded="false">
			    <?php echo $_SESSION["sesion"]['usuario'] ?>
			  </a>
			  <ul class="dropdown-menu dropdown-menu-lg-end">
			  	<li><a class="dropdown-item" type="button" href="./">Perfil</a></li>
			    <li><a class="dropdown-item" type="button" href="../Ajax/php/cerrarsesion.php">Cerrar Sesion</a></li>
			  </ul>
			</div>
	  </div>
    </div>
	</nav>
	<!-- NavBar-->

	<div class="container mt-5 pt-5 perfil" style="">
        <div class="container">
            <div class="col-md-12 m-auto">
                <h4>
                    <b id="nombreCompleto"></b>
                </h4>
                <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active pt-lg-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				            <div class="row">
					  	        <div class="col-md-3 mb-sm-3 mb-3">
				                    <div class="profile-img ml-auto" id="avatar">
				                        <img class="w-100" src="../img/avatar.png" alt="">
				                    </div>
				                    <div class="">
				                        <a class="btn btn-primary w-100" style="border-radius: 0;" name="btnAddMore" href="configuracion.php">Editar Perfil</a>
				                    </div>
				                </div>
				                <div class="col-md-7" id="datos">
				                	
				                </div>
				            </div>

					  </div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					  	<div class="row">
						  	<div class="col-md-6">
						  		<h3>Empleos por lenguaje</h3>
						  		<canvas id="myChart" width="200" height="100"></canvas>
						  	</div>
						  	<div class="col-md-6">
						  		<h3>Empleos vs Desarrolladores</h3>
						  		<canvas id="myChart2" width="200" height="100"></canvas>
						  	</div>
						</div>
					  </div>
					</div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!--div-container-->

    <!--JQuery-->
    <script src="../js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
    	(()=>{
    		$.post('../Ajax/php/desarrolladorPerfil.php', function(data){
    			json = JSON.parse(data);
                document.getElementById("datos").innerHTML = json.informacion;
                document.getElementById("nombreCompleto").innerHTML = json.nombre;
                document.getElementById('usuario').innerHTML = json.usuario;
    		});
    	})();


    	function Estadisticas(){
	    	$.post('../Ajax/php/estadisticas2.php', (data)=>{
	    		console.log(data);
				let json = JSON.parse(data);
				if(json.status){
					let val = json.emp;
			    	var ctx = document.getElementById('myChart').getContext('2d');
					var myChart = new Chart(ctx, {
					    type: 'pie',
					    data: {
					        labels: ['Java', 'php', 'python', 'Javascript','C++', 'Ruby', '.NET'],
					        datasets: [{
					            label: '# of Votes',
					            data: [val['Java'], val['php'], val['python'], val['Javascript'], val['C++'], val['Ruby'], val['.NET']],//[val.Java, val.php, val.Javascript, val.['c++'], val.Ruby, val.['.NET']],
					            backgroundColor: [
					                'rgba(255, 99, 132, 0.5)',
					                'rgba(54, 162, 235, 0.5)',
					                'rgba(255, 206, 86, 0.5)',
					                'rgba(75, 192, 192, 0.5)',
					                'rgba(153, 102, 255, 0.5)',
					                'rgba(255, 159, 64, 0.5)',
					                'rgba(150, 159, 64, 0.5)'
					            ],
					            borderColor: [
					                'rgba(255, 99, 132, 1)',
					                'rgba(54, 162, 235, 1)',
					                'rgba(255, 206, 86, 1)',
					                'rgba(75, 192, 192, 1)',
					                'rgba(153, 102, 255, 1)',
					                'rgba(255, 159, 64, 1)',
					                'rgba(150, 159, 64, 1)'
					            ],
					            borderWidth: 1
					        }]
					    }
					});
				}
			});


			$.post('../Ajax/php/estadisticas.php', (data)=>{
				let json = JSON.parse(data);
				if(json.status){
					var ctx2 = document.getElementById('myChart2').getContext('2d');
					var myChart2 = new Chart(ctx2, {
					    type: 'bar',
					    data: {
					        labels: ['Empleos', 'Developers'],
					        datasets: [{
					            label: 'Empleos vs Desarrolladores',
					            data: [json.des, json.emp],
					            backgroundColor: [
					                'rgba(255, 99, 132, 0.5)',
					                'rgba(54, 162, 235, 0.5)'
					            ],
					            borderColor: [
					                'rgba(255, 99, 132, 1)',
					                'rgba(54, 162, 235, 1)',
					            ],
					            borderWidth: 1
					        }]
					    },
					    options: {
					        scales: {
					            y: {
					                beginAtZero: true
					            }
					        }
					    }
					});
				}
			});
			
		}
		
    </script>

</body>