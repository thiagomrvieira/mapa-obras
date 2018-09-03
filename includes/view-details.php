<?php

$data = new DateTime($obra->modified);


$mensagem =
"<div id='pagina-obra'> <span style='color : #999'>Você está aqui: <a style='color : #005DA6;' href='/'>Início</a> / <a style='color : #005DA6;' href='/mapa-obras'>Mapa de Obras</a> / $obra->title</span><br><br>
<h2> $obra->title </h2>
<h4 style='padding-top : 20px;'><strong>Município:</strong> $obra->extra_fields_search</h4><br/>
<h4><strong>Útima atualização: </strong>". $data->format('d/m/Y')."</h4><br/>
$obra->introtext<div>";

?>