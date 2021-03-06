<!DOCTYPE html>
<?php 
	require_once('php/BD.class.php');
?>
<html>
<?php require_once("includes/head.html");?>
<body>
	<?php 
	require_once("includes/header.php");
    //print_r($_SESSION);
	?>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="peliculas.php">Películas</a></li>
      <li>Películas mejor valoradas</li>
    </ul>
   <div class="container" id="carousel">
  <h2 class="text-center">Películas mejor valoradas</h2> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
      <?php
        $pelis=BD::obtenerPelisValoradas();
        for($i = 0; $i < sizeof($pelis); $i++){
            if($i <=3){
             if($i==0){   
           echo ' <div class="carousel-inner">
              <div class="item active">
                <a href="ficha.php?place='.$pelis[$i]["place"].'"><img src="'.$pelis[$i]["images"].'" alt="'.$pelis[$i]["movie_title"].'" style="width:100%;"></a>
              </div>';
                 }else{
              echo'<div class="item">
                 <a href="ficha.php?place='.$pelis[$i]["place"].'"><img src="'.$pelis[$i]["images"].'" alt="'.$pelis[$i]["movie_title"].'" style="width:100%;"></a>
            </div>';   
             }
            }
        }
    ?>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="container">
<div class="row">
    <form class="navbar-form">
          <div class="form-group">
            <i class="fa fa-search"></i><input type="text" class="form-control" placeholder="Buscar Películas" id="busqueda" onkeyup="ajaxBuscar()" name="titulo">
          </div>
        	<section class="resultadoBusqueda" id="resultadoBusqueda"></section>
	<section class="resultadoFiltro" id="resultadoFiltro"></section>
    </form>
</div>
<div class="row my-4">
    <form action="php/procesar.php?accion=filtrar" method="post" class="form-inline m-auto">
        <label>Ordenar por:</label>    
        <label class="radio-inline"><input type="radio" name="filtrar" value="titulo">Título</label>
        <label class="radio-inline"><input type="radio" name="filtrar" value="fecha">Fecha de estreno</label>
        <label class="radio-inline"><input type="radio" name="filtrar" value="puntuacion">Puntuación</label>
        <label class="radio-inline"><input type="radio" name="filtrar" value="actores">Actores y directores</label>
        <input type="submit" class="btn btn-default" value="Filtrar">
    </form>
</div>    
</div>    
<div class="container m-auto fichas">
<div class="row card-deck my-4">
        <?php
    $filtrar=BD::obtenerPelisValoradas();
      if(isset($_SESSION["filtrar"])){
          $accion=$_SESSION["filtrar"];
      if($accion==1){
          $filtrar=BD::obtenerPelisTitulo();
          //require_once('filtrar/titulo.php');
          $_SESSION["filtrar"]==0;
      }else if($accion==2){
          $filtrar=BD::obtenerPelisFecha();
          //require_once('filtrar/fecha.php');
          $_SESSION["filtrar"]==0;
      }else if($accion==3){
          $filtrar=BD::obtenerPelisValoradas();
          //require_once('filtrar/puntuacion.php');
          $_SESSION["filtrar"]==0;
      }else if($accion==4){
          $filtrar=BD::obtenerPelisActores();
          //require_once('filtrar/actores.php');
          $_SESSION["filtrar"]==0;
      }
      }
      
        for($i = 0; $i < sizeof($filtrar); $i++){
            if($i <=3){  
       echo '<div class="col-12 col-lg-3 col-md-6 p-0 ficha" id="filtro"> 
                <a href="ficha.php?place='.$filtrar[$i]["place"].'">
              <div class="card bd-light p-0">
               <div class="card-title">
                <h4 class="text-uppercase text-center">'.$pelis[$i]["movie_title"].'</h4>
                </div>
                    <img src="'.$filtrar[$i]["images"].'" alt="'.$filtrar[$i]["movie_title"].'" class="img-fluid rounded">
                 <div class="card-footer"> 
                    <h5 class="card-footer text-center">Año '.$filtrar[$i]["year"].'</h5>
                    <h5 class="card-footer text-center">Puntuación '.$filtrar[$i]["rating"].'</h5>
                 </div>    
              </div>
              </a>
            </div>';
            }
        }
    ?>
</div>
</div>    
</body>
</html>
<script type="text/javascript">
        /*************************Peticion AJAX del campo Buscar ******************/
        var peticionBusqueda;
        if(window.XMLHttpRequest) {
            peticionBusqueda = new XMLHttpRequest();
        } else if(window.ActiveXObject) {
            peticionBusqueda = new ActiveXObject("Microsoft.XMLHTTP");
        }else{
            alert("Su navegador no soporta AJAX");
        }
        function procesarBusqueda(){
            if(peticionBusqueda.readyState==4){//tengo respuesta completa
                if(peticionBusqueda.status==200){//todo ha ido bien
                    //es texto (aunque venga con html incluido)
                    document.getElementById("resultadoBusqueda").innerHTML=peticionBusqueda.responseText;
                }
            }
        }
        function ajaxBuscar(){
            if(document.getElementById("busqueda").value.length == 0){                    
                document.getElementById("resultadoBusqueda").innerHTML="No ha introducido ningun parametro en la busqueda";
            }else{
                //Asignar la función de procesamiento
                peticionBusqueda.onreadystatechange=procesarBusqueda;
                //preparar la petición: procesarAjax.php necesita los parámetros por POST
                peticionBusqueda.open("POST","php/procesar.php?accion=buscar",true);   //asíncrono
                peticionBusqueda.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

                //enviar la petición con el parámetro acccion
                //y el valor de la select
                var texto="busqueda=";
                texto+=document.getElementById("busqueda").value;
                peticionBusqueda.send(texto);
            }
        }
</script>