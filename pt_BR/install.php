<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Aplicativos Automáticos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="jumbotron text-center">
  <h1>Aplicativos Automáticos</h1>
  <h3>Por <a href="https://ribafs.org">RibaFS</a></h3>
  <h5 style="color: red">Crie o banco de dados e importe o script do raiz ou use outro banco existente.</h3>  
</div>

<h3 align="center">Como Funciona</h3>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
<p>Este software cria o código de um CRUD automaticamente para cada tabela do banco informado no primeiro acesso. Ele tem um código básico na pasta core que ele copia para cada tabela do banco e adapta para as tabelas usando as funções de metadados do SGBD (na classe Crud()).</p>
    </div>
</div>

<div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <h2>Entre com os detalhes do banco</h2>
  <form method="POST" action="">
    <div class="form-group">
      <input type="text" class="form-control" id="host" name="host" value="Servidor (localhost)" required>
    </div>
    <div class="form-group">
      <input type="test" class="form-control" id="db" placeholder="Nome do banco" name="db" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="user" name="user" value="root" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pass" placeholder="Senha" name="pass">
    </div>
    <div class="form-group">
      <input type="sgbd" class="form-control" id="sgbd" name="sgbd" value="mysql">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="port" name="port" value="3306">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
  </div>
</div>

</body>
</html>

<?php

if(isset($_POST['host'])){

$host = $_POST['host'];
$db = $_POST['db'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$sgbd = $_POST['sgbd'];
$port = $_POST['port'];

$content = "<?php

class Connection
{
	private \$host = '$host';
	private \$db = '$db';
	private \$user = '$user';
	private \$pass = '$pass';
	public  \$sgbd = '$sgbd';
	private \$port = '$port';
";

    if(is_readable('./classes/connection.txt')){
        $fp = fopen('./classes/connection.txt', "r");
        $content2 = fread($fp, filesize ('./classes/connection.txt'));
        fclose($fp);
    }else{
        echo "<script>alert('The directory classes require read permission to web server!')</script>";
        exit;
    }

    $content .=$content2;

    if(is_writable('./classes')){
        $fp = fopen('./classes/connection.php', "w");
        fwrite($fp, $content);
        fclose($fp);
    }else{
        echo "<script>alert('The directory classes require write permission to web server!')</script>";
        exit();
    }

    header('location: index.php');
}
?>
