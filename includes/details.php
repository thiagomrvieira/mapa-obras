<?php 
function valid_obra($id){
	
	$con = JFactory::getDBO();
	$main = JFactory::getApplication();
	$sql = "SELECT count(title) as qtd FROM `dev_seinfra_k2_items` WHERE id='$id'";
	$con->setQuery($sql);
	$objeto = $con->loadObjectList();
	$qtd = $objeto[0]->qtd;
	
	if ($qtd>=1){
		return true;
	}else{
		return false;
	}
	
	
}


function show_details_obras($id){
	//CRIAR CONEXÃO
	$con = JFactory::getDBO();
	//CHAMANDO O APPLICATION
	$main = JFactory::getApplication();

	$sql = "SELECT * FROM `dev_seinfra_k2_items` WHERE id='$id'";
	$con->setQuery($sql);
	$objeto = $con->loadObjectList();
	$obra = $objeto[0];
	include_once 'view-details.php';	
	return $mensagem;
}

?>