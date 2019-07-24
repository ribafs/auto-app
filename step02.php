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
