<div class="itemView">
<?php 

$mapa_id = substr($_SERVER['REQUEST_URI'],12);

require_once "includes/conexao.php";

if ($mapa_id==""){
    include_once "includes/querys.php";
	include_once "includes/form.php";
	
}else{
	include_once "includes/details.php";
	if (valid_obra($mapa_id)){
		echo show_details_obras($mapa_id);
	}else{
		header("Location: /mapa-obras");
		die();
	}
}

?>
</div>