<?php
    $url = 'http://www.zaragoza.es/api/recurso/urbanismo-infraestructuras/equipamiento/aparcamiento-bicicles=1000';
    $content = file_get_contents($url);
    echo $content;
    $json = json_decode($content, true);
?>
