<?php
require_once('config.php');

class BD {
    protected static function ejecutaConsulta($sql) {

		global $host, $bd, $login, $password;
        try{
			$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$dsn = "mysql:host=$host;dbname=$bd";
			$dwes = new PDO($dsn, $login, $password, $opc);
		}catch(PDOException $e){
			die("Error: " . $e->getMessage());
		}
		$resultado = null;
		if (isset($dwes)){
			$resultado = $dwes->query($sql);
		}

        return $resultado;

    }

//-------------------------------------- Select ------------------------------------------
    public static function obtenerPelis() {

        $sql = "SELECT * FROM pelis";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }
    public static function obtenerPelisporId($place) {

        $sql = "SELECT * FROM pelis where place='$place'";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }
	public static function obtenerPelisValoradas() {

        $sql = "SELECT * FROM pelis order by rating desc";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }
    public static function obtenerPelisTitulo() {

        $sql = "SELECT * FROM pelis order by movie_title";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }
    public static function obtenerPelisFecha() {

        $sql = "SELECT * FROM pelis order by year desc";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }    
    public static function obtenerPelisActores() {

        $sql = "SELECT * FROM pelis order by star_cast";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }    
    public static function obtenerPelisNombreFiltro($busqueda) {

        $sql = "SELECT * FROM `pelis` WHERE `movie_title` LIKE '%".$busqueda."%'";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }

//-------------------------------------- Insert ------------------------------------------


//-------------------------------------- Update ------------------------------------------
    public static function modificarFichaPelicula($puntuacion, $age, $reparto, $place) {
        $sql = "UPDATE pelis SET rating='$puntuacion', year='$age', star_cast='$reparto' WHERE place=$place";
		$resultado = self::ejecutaConsulta($sql);

		return $resultado;
    }

//-------------------------------------- Delete ------------------------------------------
  public static function eliminarPelicula($place) {
      $sql = "DELETE FROM `pelis` WHERE `place`='".$place."'";
    $resultado = self::ejecutaConsulta($sql);
    return $resultado;
  }
}
?>