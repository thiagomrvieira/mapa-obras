<?php


function preenche_select(){
    $con = JFactory::getDBO();
    $main = JFactory::getApplication();
    $sql = "SELECT value FROM `dev_seinfra_k2_extra_fields` WHERE name = 'Municipios' ORDER BY name ASC";
   
    
    $con->setQuery($sql);
    $objeto = $con->loadObjectList();	
    $obj_municipios = json_decode($objeto[0]->value);
  
    asort($obj_municipios);
    
    for ($i = 0; $i < sizeOf($obj_municipios); $i++) {
        $mensagem .= "<option value='".$obj_municipios[$i]->name."'> ".$obj_municipios[$i]->name." </option>";
    }
    
   
    return $mensagem;
    
   
    
}

function retorna_todas_obras(){
    //CRIAR CONEXÃO
    $con = JFactory::getDBO();
    //CHAMANDO O APPLICATION
    $main = JFactory::getApplication();
    //$f_sql = "SELECT id_escola,nome FROM `#__escolas_estaduais_alagoas` LIMIT 10;";
    
    $sql = "SELECT title, id, extra_fields_search FROM `dev_seinfra_k2_items` WHERE catid = 81 ORDER BY created";
    $con->setQuery($sql);
    $objeto = $con->loadObjectList();
    
    for ($i=0;$i<sizeOf($objeto);$i++){
        $mensagem.="<li><a href='/mapa-obras/".$objeto[$i]->id."'>".$objeto[$i]->title. " - ". $objeto[$i]->extra_fields_search. "</a></li>";
    }
    
    return $mensagem;
}


function retorna_obras($municipio, $nome) {
       
    //CRIAR CONEXÃO
    $con = JFactory::getDBO();
    //CHAMANDO O APPLICATION
    $main = JFactory::getApplication();
    
    //SQL de busca pelo munic�pio
    if (($municipio!="")&&($nome=="")){
        
        $sql = "SELECT title, id FROM `dev_seinfra_k2_items` WHERE catid = 81 AND lower(extra_fields_search) LIKE lower('%$municipio%') ORDER BY publish_up";
    }
    //SQL de busca pelo nome
    if (($municipio=="")&&($nome!="")){
        
        $sql = "SELECT title, id FROM `dev_seinfra_k2_items` WHERE catid = 81 AND lower(title) LIKE lower('%$nome%') OR lower(extra_fields_search) LIKE lower('%$nome%') ORDER BY publish_up";   
    }
    //SQL de busca pelo nome e munic�pio
    if (($municipio!="")&&($nome!="")){
        
        $sql = "SELECT title, id FROM `dev_seinfra_k2_items` WHERE catid = 81 AND lower(title) LIKE lower('%$nome%') AND lower(extra_fields_search) LIKE lower('%$municipio%') ORDER BY publish_up"; 
    }   
    
        
    $con->setQuery($sql);
    $objeto = $con->loadObjectList();
    
    
    if (empty($objeto)) {
        $qtd = 0;
        
    }
    for ($i=0;$i<sizeOf($objeto);$i++){
        $mensagem.="<li><a href='/mapa-obras/".$objeto[$i]->id."'>".$objeto[$i]->title."</a></li>";
        $qtd ++;
       
    }
    //MENSAGEM DE SAÍDA
    if (empty($objeto)) {
        echo "<p> Ainda não temos obras em ". $municipio . "</p>";
    }else{
        
        if (!empty($nome)) {
            echo "<p> Busca por ".$nome . " - <br>" . $qtd . " resultados: </p>";
        }
        if (!empty($municipio)) {
            echo "<p> Busca por obras em ".$municipio . " - <br>" . $qtd . " resultados: </p>";
        }
    
    }
    
    
    return $mensagem;
    
    
    
}




?>
