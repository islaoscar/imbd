<?php
require_once ("BD.class.php");
session_start();
$accion = $_GET['accion'];

if ($accion == 'mail'){
    $_SESSION["mensaje"]=1;
    header("Location: ../index.php");
}else if($accion == 'fichaPelis'){
    if(isset($_POST["actualizar"])){
        $puntuacion=$_POST["puntuacion"];
        $age=$_POST["age"];
        $reparto=$_POST["reparto"];
        $place=$_POST["posicion"];
        $modificar=BD::modificarFichaPelicula($puntuacion, $age,$reparto, $place);
        if(count($modificar)==1){
            $_SESSION["mensaje"]=4;
            header("Location: ../ficha.php?place=".$place);
        }else{
            $_SESSION["mensaje"]=5;
            header("Location: ../ficha.php?place=".$place);
        }
    }else if(isset($_POST["notificacionBorrar"])){
        $place=$_POST["place"];
        $_SESSION["mensaje"]=2;
        $_SESSION["place"]=$place;
        echo $place;
        $place=$_POST['place'];
        header("Location: ../ficha.php?place=".$place);
}
}else if($accion == 'borrar'){
    if(isset($_SESSION['place'])){
      $place = $_SESSION['place'];
    }
      $eliminar=BD::eliminarPelicula($place);
    if(count($eliminar)==1){
      $_SESSION['mensaje']=3;
      header("Location: ../peliculas.php");
    }else{
      header("Location: ../index.php"); 
    }
}else if($accion=="filtrar"){
    if(isset($_POST["filtrar"])){
        $filtrar=$_POST["filtrar"];
    }
    switch($filtrar){
        case "titulo":
                $_SESSION["filtrar"]=1;
                header("Location: ../peliculas-valoradas.php");
                break;        
        case "fecha":
                $_SESSION["filtrar"]=2;
                header("Location: ../peliculas-valoradas.php");
                break;        
        case "puntuacion":
                $_SESSION["filtrar"]=3;
                header("Location: ../peliculas-valoradas.php");
                break;        
        case "actores":
                $_SESSION["filtrar"]=4;
                header("Location: ../peliculas-valoradas.php");
                break;
        default:
            header("Location: ../peliculas-valoradas.php");
            break;
    }
}else if($accion=="filtrar2"){
    if(isset($_POST["filtrar"])){
        $filtrar=$_POST["filtrar"];
    }
    switch($filtrar){
        case "titulo":
                $_SESSION["filtrar"]=1;
                header("Location: ../peliculas.php");
                break;        
        case "fecha":
                $_SESSION["filtrar"]=2;
                header("Location: ../peliculas.php");
                break;        
        case "puntuacion":
                $_SESSION["filtrar"]=3;
                header("Location: ../peliculas.php");
                break;        
        case "actores":
                $_SESSION["filtrar"]=4;
                header("Location: ../peliculas.php");
                break;
        default:
            header("Location: ../peliculas.php");
            break;
    }
}else if($accion=="buscar"){
    $busqueda=$_POST['busqueda'];
		$filtro= BD::obtenerPelisNombreFiltro($busqueda);
		//Comprobar si está vació y si no lo está, muestra el resultado obtenido
		if(empty($filtro)) {
		//Está vació
		} else {
			echo "<hr>";
			echo "Películas encontradas: <br>";
			echo "<ul>";
			foreach ($filtro as $texto){
			//No lo está
				echo '<li class="filtroTexto"><a href="ficha.php?place='.$texto['place'].'" >';
                echo $texto['movie_title'];
                echo '</a></li>';
			}
			echo "</ul>";
		}
}
?>    