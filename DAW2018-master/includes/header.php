<header>
<nav class="navbar-inverse">
<!--	navbar-fixed-top para fijar la barra arriba, se come una parte de lo siguiente-->
  <div class="container-fluid">
      <!-- Menu que se mostrara al reducir el tamaño de la ventana -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                   
      </button>
      <a class="navbar-brand" href="index.php">IMBd</a>
    </div>
      
      <!-- Menu principal de la barra de navegación -->
    <div class="collapse navbar-collapse" id="myNavbar">
        <!-- Menu de la izquierda de navegación -->
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Inicio</a></li>
          <!-- Lista desplegable de las zonas -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Películas <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="#">En el aire</a></li>
              <li><a href="#">Próximos extremos</a></li>
              <li><a href="peliculas-valoradas.php">Películas mejor valoradas</a></li>
          </ul>
        </li>
          <!-- Lista desplegable del menu con los sectores de la zona seleccionada -->
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown">Eventos y noticias <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="#">Noticias de cine</a></li>
              <li><a href="#">Noticias de TV</a></li>
              <li><a href="#">Noticias de famosos</a></li>
              <li><a href="#">Encuestas</a></li>
          </ul>
        </li>
        <li><a href="contacto.php">Contactar</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
