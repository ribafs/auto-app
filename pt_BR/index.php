<?php

if(!file_exists('./classes/connection.php')){
    header('location: install.php');
}

require_once('./header.php');
require_once('./classes/connection.php');
$conn = new Connection();

$nrtables = count($conn->tableNames());
$sel = 'Selecione uma Tabela';
?>

<br><br><br>
<style>
hr{
    display:none;
}
</style>
<div class="container cabecalho">
    <h1 align="center">Aplicativo com CRUDs Automáticos</h1>
</div>
	<div align="center">
		<h3><?php if($nrtables > 0) print $sel; ?></h3>
		<h4>
        <br>
<?php

if($nrtables > 0){
    for($x=0;$x < $nrtables;$x++){
        // Nome da tabela
        $table = $conn->tableNames()[$x];

        //if($table != 'nomeTabela') continue;

        // Copiar pasta core para cada tabela
        if(!file_exists($table)){
            $conn->copyDir('core',$table);
        }
    ?>
            <!-- Link para cada tabela -->    
		    <a href="<?=$conn->tableNames()[$x]?>?table=<?=$table?>"><?=ucfirst($table)?></a>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php 
    }
		print '<br><br><h4><a href="ajuda.pdf" target="_blank">Ajuda</a></h4>';
}else{
    print "<h3>Nenhuma tabela no banco de dados!</h3>";
}
?>
		</h4>
	</div>
</div>
<br><br><br>
<?php require_once('./footer.php'); ?>

