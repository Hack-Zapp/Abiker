<?php
    require_once "dataDB.php"; 
	
    $url = "https://www.zaragoza.es/api/recurso/urbanismo-infraestructuras/equipamiento/aparcamiento-bicicleta.json?rows=1000";
    $content = file_get_contents($url);
    $data = json_decode($content);
    $bikeRacks = $data->result; 

    $bd = new ClaseBD();
    foreach($bikeRacks as $bikeRack){
        $id = $bikeRack->id;
		$title = $bikeRack->title; 
        $coords = $bikeRack->geometry->coordinates;
        $coords = $coords[0].",".$coords[1];
        $capacity = 0;
        $rating = 0;
        $sql = "INSERT INTO PARKINGS 
            VALUES (NULL, \"$title\", \"$coords\", 0, 0, \"$id\", \"Aparcabicis\")";
        $bd->executeQuery($sql);
    }

?>
