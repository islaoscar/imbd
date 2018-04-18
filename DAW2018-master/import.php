<?php 
$json= file_get_contents('pelis.json');

//echo $json;

$data= json_decode($json, true);

//echo $data;
//var_dump(json_decode($json));
foreach($data as $row){
    //echo $place;
    $images = $row['images'];
    $link = $row['link'];
    $movie_title = $row['movie_title'];
    $place = $row['place'];
    $rating = $row['rating'];
    $star_cast = $row['star_cast'];
    $vote = $row['vote'];
    $year = $row['year'];
}

$sql ="INSERT INTO pelis values('$images','$link','$movie_title','$place','$rating','$star_cast','$vote','$year')";

mysqli_query($sql);
?>