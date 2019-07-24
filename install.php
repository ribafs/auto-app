<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Automatic Application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>PHP Automatic Application</h1>  
</div>

<div class="container">
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  <h2>Enter your database details</h2>
  <form method="POST" action="">
    <div class="form-group">
      <input type="text" class="form-control" id="host" name="host" value="localhost" required>
    </div>
    <div class="form-group">
      <input type="test" class="form-control" id="db" placeholder="Enter database name" name="db" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="user" name="user" value="root" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass">
    </div>
    <div class="form-group">
      <input type="sgbd" class="form-control" id="sgbd" name="sgbd" value="mysql">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="port" name="port" value="3306">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  </div>
</div>

	<div align="center">By <a href="https://ribafs.org">RibaFS</a></div> 
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
