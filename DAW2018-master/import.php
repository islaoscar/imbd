<?php 
require_once('includes/head.html');
$json= file_get_contents('pelis.json');

//echo $json;

$data= json_decode($json, true);

//echo $data;
//var_dump(json_decode($json));
foreach($data as $row){
    $image = $row['images'];
    $images=json_encode($image);
    $link = $row['link'];
    $movie_title = $row['movie_title'];
    $place = $row['place'];
    $rating = $row['rating'];
    $star_cast = $row['star_cast'];
    $vote = $row['vote'];
    $year = $row['year'];
    $sql ="INSERT INTO pelis values('".$images."','".$link."','".$movie_title."','".$place."','".$rating."','".$star_cast."','".$vote."','".$year."')";
    echo $sql.";";
}
//Este fichero devuelve todos los insert para la base de datos, pero tiene un problema en el campo images, que esta entre[], por lo que los inserts buenos estarán almacenados en el fichero inserts.txt

?>