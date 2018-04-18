<!DOCTYPE html>
<?php 
	require_once('php/BD.class.php');
?>
<html>
<?php require_once("includes/head.html");?>
<body>
	<?php 
	require_once("includes/header.php");
    if(isset($_SESSION["mensaje"])){
        $accion=$_SESSION["mensaje"];
    if($accion==2){
        echo '<script>confirmar();</script>';
        $_SESSION["mensaje"]=0;
    }else if($accion==4){
        echo '<script>alertaModificarPelicula();</script>';
        $_SESSION["mensaje"]=0;
    }else if($accion==5){
        echo '<script>alertaError();</script>';
        $_SESSION["mensaje"]=0;
    }
    }
	?>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="peliculas-valoradas.php">Películas</a></li>
      <li>Ficha</li>
    </ul>
    <?php
    $place=$_GET["place"];
    $pelisId=BD::obtenerPelisporId($place);
    for($i = 0; $i < sizeof($pelisId); $i++){
      echo '   
      <div class="container m-auto">
        <h2>'.$pelisId[$i]["movie_title"].'</h2>
        <div class="row col-lg-4 col-12">
            <img src="'.$pelisId[$i]["images"].'" alt="'.$pelisId[$i]["movie_title"].'" class="img-fluid rounded">
        </div>
        <div class="row col-lg-8 col-12">
           <form action="php/procesar.php?accion=fichaPelis" method="post" class="form-horizontal">
           <div class="form-group">
              <label class="control-label col-sm-2" for="nombre">Posición Ranking:</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="posicion" name="posicion" readonly value="'.$pelisId[$i]["place"].'">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="puntuacion">Puntuación:</label>
              <div class="col-sm-5">
                <input type="number" class="form-control" step = "any" id="puntuacion" name="puntuacion" value="'.$pelisId[$i]["rating"].'">
              </div>
            </div>
           <div class="form-group">
              <label class="control-label col-sm-2" for="age">Año:</label>
              <div class="col-sm-5">
                <input type="number" class="form-control" id="age" name="age" value="'.$pelisId[$i]["year"].'">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="reparto">Reparto:</label>
              <div class="col-sm-5">
                <textarea id="reparto" name="reparto" class="form-control" rows="4">'.$pelisId[$i]["star_cast"].'</textarea>
              </div>
            </div>
             <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-12">
                    <a href="https://www.imdb.com'.$pelisId[$i]["link"].'" class="btn btn-primary" id="enviarMensaje">Ver ficha en IMBd</a>
                    <button type="submit" class="btn btn-secondary" id="enviarMensaje" name="actualizar">Actualizar</button>
                    <button type="submit" class="btn btn-secondary" id="enviarMensaje" name="notificacionBorrar">Borrar</button>
                    <input type="hidden" name="place" value="'.$place.'">
              </div>
            </div>
       </form>
        </div>
      </div> '; 
    }
    ?>
  
</body>
</html>    