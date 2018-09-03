<?php 
    
    
    
    spl_autoload_register(function($nomeClasse){
        
        if (file_exists($nomeClasse. ".php") == true) {
            require_once($nomeClasse. ".php");
        }
        
    });
        
    

 ?>