<span style='color : #999'>Você está aqui: <a style='color : #005DA6;' href='/'>Início</a> / Mapa de obras</span><br><br>
<h2> Mapa de Obras </h2>

<div id="buscar-obras">
	<form action=""; method="post">
		<div id="buscar-obras-opcoes">
			<input id="buscar-obras-nome" type="text" name="nome" placeholder="Insira o nome da obra" />
	    	<select id="buscar-obras-municipio" name="municipio">
	    
		    <option disabled selected value="">Selecione um Município</option>  
			<?php 
			echo preenche_select();
			?>
		    </select>
	    </div>
	    
	    <div id="buscar-obras-botoes">
			<input id="buscar-obras-botao-buscar" class="buscar-obras-botao" type="submit" name="sbmt-type" value="Buscar">
			<input class="buscar-obras-botao" type="submit" name="sbmt-type" value="Listar Todas">
		</div>
		
		
		
	</form> <br>
</div>

<?php 
	/*if (isset($_POST["municipio"])) {
	    echo retorna_escolas_municipio($_POST["municipio"]);
	}*/	
	if (isset($_POST["sbmt-type"])) {
		?>
		
		<ul id="buscar-obra-lista">
		
		<?php
		if ($_POST["sbmt-type"]=="Listar Todas"){
		    echo "<p> Todas as obras: </p>";
		    echo retorna_todas_obras();
		}
		
		if ($_POST["sbmt-type"]=="Buscar"){
			if ($_POST["nome"]==""&&$_POST["municipio"]==""){
				echo "<span class=\"buscar-escolas-aviso\">Preencha algum campo de busca.</span>";
			}else{
			    echo retorna_obras($_POST["municipio"], $_POST["nome"]);
			}
			
		}
		
		?>
		
		</ul>
		
		<?php
	
	}
	
	?>
	