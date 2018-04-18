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
        if($accion==1){
            echo '<script>alertaTrue();</script>';
            $_SESSION["mensaje"]=0;
        }}
	?>
</body>
</html>