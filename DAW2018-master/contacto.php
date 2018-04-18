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
      <li>Contactar</li>
    </ul>
   <div class="container" id="contacto">
      <h3><i class="fa fa-envelope-o"></i> Contacto:</h3>
       <form action="php/procesar.php?accion=mail" method="post" class="form-horizontal" onsubmit="return checkSubmit();">
           <div class="form-group">
              <label class="control-label col-sm-2" for="nombre">Nombre:</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="nombre" placeholder="" name="nombre" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Correo:</label>
              <div class="col-sm-5">
                <input type="email" class="form-control" id="email" placeholder="" name="email" required>
              </div>
            </div>
           <div class="form-group">
              <label class="control-label col-sm-2" for="email">Asunto:</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="asunto" placeholder="" name="asunto" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="mensaje">Mensaje:</label>
              <div class="col-sm-5">
                <textarea id="mensaje" name="mensaje" class="form-control" rows="4" required="required" placeholder=""></textarea>
              </div>
            </div>
            <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-12">
                    <button type="submit" class="btn btn-secondary" id="enviarMensaje">Enviar Mensaje</button>
                    <a href="index.php" class="btn btn-primary" id="enviarMensaje">Inicio</a>
              </div>
            </div>
       </form>
   </div>
</body>
</html>
<script>
var statSend = false;
function checkSubmit() {
    if (!statSend) {
        statSend = true;
        return true;
    } else {
        alert("El formulario ya se está enviando...");
        return false;
    }
}
</script>