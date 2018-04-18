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
    if(isset($_SESSION["mensaje"])){
        $accion=$_SESSION["mensaje"];
    if($accion==3){
        echo '<script>alertaEliminarPelicula();</script>';
        $_SESSION["mensaje"]=0;
    }}
	?>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a></li>
      <li>Películas</li>
    </ul>  
    <h2 class="text-center">Películas</h2>
    <div class="container col-12">
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
    <form action="php/procesar.php?accion=filtrar2" method="post" class="form-inline m-auto">
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
    $pelis=BD::obtenerPelisValoradas();
    $filtrar=BD::obtenerPelisValoradas();
      if(isset($_SESSION["filtrar"])){
          $accion=$_SESSION["filtrar"];
      if($accion==1){
          $filtrar=BD::obtenerPelisTitulo();
          $_SESSION["filtrar"]==0;
      }else if($accion==2){
          $filtrar=BD::obtenerPelisFecha();
          $_SESSION["filtrar"]==0;
      }else if($accion==3){
          $filtrar=BD::obtenerPelisValoradas();
          $_SESSION["filtrar"]==0;
      }else if($accion==4){
          $filtrar=BD::obtenerPelisActores();
          $_SESSION["filtrar"]==0;
      }
      }
      
        for($i = 0; $i < sizeof($filtrar); $i++){  
       echo '<div class="col-12 col-lg-3 col-md-6 p-0 w-auto h-auto ficha" id="filtro"> 
                <a href="ficha.php?place='.$filtrar[$i]["place"].'">
              <div class="card bd-light p-0">
               <div class="card-title">
                <h4 class="text-center h5">'.$filtrar[$i]["movie_title"].'</h4>
                </div>
                    <img src="'.$filtrar[$i]["images"].'" alt="'.$filtrar[$i]["movie_title"].'" class="img-fluid rounded">
                 <div class="card-footer"> 
                    <h5 class="card-footer text-center h6">Año '.$filtrar[$i]["year"].'</h5>
                    <h5 class="card-footer text-center h6">Puntuación '.$filtrar[$i]["rating"].'</h5>
                 </div>    
              </div>
              </a>
            </div>';
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