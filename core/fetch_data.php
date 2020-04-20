<?php
include_once("../classes/crud.php");
$table = $_GET['table'];
$crud = new Crud($pdo,$table);

if (isset($_POST["page"])) {
    $page_no = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_no))
        die("Error fetching data! Invalid page number!!!");
} else {
    $page_no = 1;
}

// get record starting position
$start = (($page_no-1) * $conn->regsPerPage);

if($conn->sgbd == 'mysql'){
    $results = $crud->pdo->prepare("SELECT * FROM $crud->table ORDER BY id LIMIT $start, $conn->regsPerPage");
}else if($conn->sgbd == 'pgsql'){
    $results = $crud->pdo->prepare("SELECT * FROM $crud->table ORDER BY id LIMIT $conn->regsPerPage OFFSET $start");
}

$results->execute();
$nr = $results->rowCount();

if($nr > 0){

    while($row = $results->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>" . $crud->rowFields($row);

        $id = $row['id'];
		    ?>
	        <td><a href="update.php?id=<?=$row['id']?>&table=<?=$table?>"><i class="glyphicon glyphicon-edit" title="Editar"></a></td>
            <td><a onclick="return confirm('Tem certeza de que deseja excluir <?=$id?> ?')" href="delete.php?id=<?=$id?>&table=<?=$table?>"><i class="glyphicon glyphicon-remove-circle" title="Excluir"></a></td></tr>
    <?php
    print "
        </tr>";
    }

}else{
    echo '<h3 class="bg-danger">Nenhum registro encontrado</h3>';
}
