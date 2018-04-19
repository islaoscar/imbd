<?php
require_once ("BD.class.php");
session_start();
$accion = $_GET['accion'];

if($accion == 'fichaPelis'){
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
}else if($accion=="mail"){
    
    require 'class.phpmailer.php';
    require 'class.smtp.php';
    $nombre=$_POST["nombre"];
    $email=$_POST["email"];
    $mensaje=$_POST["mensaje"];
    $asunto=$_POST["asunto"];
    
    $email_user = "correoelectronicogugel@gmail.com";
    $email_password = "legugocinortceleoerroc";
    $the_subject = $asunto;
    $address_to = "correoelectronicogugel@gmail.com";
    $from_name = "IMBd";
    $phpmailer = new PHPMailer();
    // ---------- datos de la cuenta de Gmail -------------------------------
    $phpmailer->Username = $email_user;
    $phpmailer->Password = $email_password; 
    //-----------------------------------------------------------------------
    $phpmailer->SMTPDebug = 0;
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->Host = "smtp.gmail.com"; // GMail
    $phpmailer->Port = 465;
    $phpmailer->isSMTP(); // use SMTP
    $phpmailer->SMTPAuth = true;
    $phpmailer->setFrom($phpmailer->Username,$from_name);
    $phpmailer->AddAddress($address_to); // recipients email
    $phpmailer->Subject = $the_subject;	
    date_default_timezone_set('Europe/Madrid');
    $phpmailer->Body .="<h4>Correo: '$email'</h4>";
    $phpmailer->Body .="<h4>Nombre: '$nombre'</h4>";
    $phpmailer->Body .="<h2 style='color:#3498db;'>Hola!</h2>";
    $phpmailer->Body .= "<p>$mensaje</p>"; 
    $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
    $phpmailer->IsHTML(true);
    $enviar=$phpmailer->send();
  
    if(!$enviar) {
        echo "Error al enviar: ".$phpmailer->ErrorInfo;
        
        header ("Location: ../index.php");
    }else{
        header ("Location: ../index.php");
        $_SESSION["mensaje"]=1; 
    }
}
?>    