<!DOCTYPE html>
<?php 
	require_once('php/BD.class.php');
?>
<html>
<?php require_once("includes/head.html");?>
<body>
	<?php 
	require_once("includes/header.php");
	?>
    <ul class="breadcrumb">
      <li><a href="index.php">Inicio</a></li>
      <li><a href="index.php">Películas</a></li>
      <li>Películas mejor valoradas</li>
    </ul>
   <div class="container">
  <h2>Películas mejor valoradas</h2> 
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
                <img src="'.$pelis[$i]["images"].'" alt="'.$pelis[$i]["movie_title"].'" style="width:100%;">
              </div>';
                 }else{
              echo'<div class="item">
                <img src="'.$pelis[$i]["images"].'" alt="'.$pelis[$i]["movie_title"].'" style="width:100%;">
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
    
<div class="container m-auto">
<div class="row card-deck my-4">
        <?php
        for($i = 0; $i < sizeof($pelis); $i++){
            if($i <=3){  
   echo '<div class="col-12 col-lg-3 col-md-6 p-0">    
          <div class="card bd-light p-0">
           <div class="card-title">
            <h3 class="text-uppercase">'.$pelis[$i]["movie_title"].'</h3>
            </div>
                <img src="'.$pelis[$i]["images"].'" alt="'.$pelis[$i]["movie_title"].'" class="img-fluid rounded">
             <div class="card-footer"> 
                <h4 class="card-footer text-justify">Año '.$pelis[$i]["year"].'</h4>
                <h4 class="card-footer text-justify">Puntuación '.$pelis[$i]["rating"].'</h4>
             </div>    
          </div>
        </div>';
            }
        }
    ?>
</div>
</div>    
</body>
</html>