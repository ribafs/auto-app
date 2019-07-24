<?php
require_once('./view/header.php');
require_once('./classes/connection.php');
$conn = new Connection();
$nrtables = count($conn->tableNames());
$sel = 'Select a Table';
?>

<br><br><br>
<style>
hr{
    display:none;
}
</style>
<div class="container cabecalho">
    <h1 align="center">PHP Automatic Application</h1>
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

        //if($table != 'tableName') continue;// Work only with one table with tableName

        // Copiar pasta core para cada tabela
        if(!file_exists($table)){
            $conn->copyDir('core',$table);
        }
    ?>
            <!-- Link para cada tabela -->    
		    <a href="<?=$conn->tableNames()[$x]?>?table=<?=$table?>"><?=ucfirst($table)?></a>&nbsp;&nbsp;&nbsp;&nbsp;
    <?php 
    }
		print '<br><br><h4><a href="help.pdf" target="_blank">Help</a></h4>';
}else{
    print "<h3>None table found!</h3>";
}
?>
		</h4>
	</div>
</div>
<br><br><br>
<?php require_once('./view/footer.php'); ?>

