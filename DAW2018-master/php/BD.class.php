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

	public static function obtenerPelisValoradas() {

        $sql = "SELECT * FROM pelis order by rating desc";
        $resultado = self::ejecutaConsulta($sql);

		$resultadoArray = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $resultadoArray;
    }


//-------------------------------------- Insert ------------------------------------------


//-------------------------------------- Update ------------------------------------------


//-------------------------------------- Delete ------------------------------------------
}
?>