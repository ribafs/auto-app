<?php

require_once 'connection.php';
$conn = new Connection();
$pdo = $conn->pdo;

class Crud extends Connection
{

	public $pdo;
	public $table;

	public function __construct($pdo, $table){
		$this->pdo = $pdo;
		$this->table = $table;
	}

    // Amount fields current table
    private function numFields(){
        $sql = 'SELECT * FROM '.$this->table.' LIMIT 1';
        $sth = $this->pdo->query($sql);
        $num_campos = $sth->columnCount();
        return $num_campos;
    }

    // Field name from number $x
    public function fieldName($x){
        $sql = 'SELECT * FROM '.$this->table.' LIMIT 1';
        $sth = $this->pdo->query($sql);
        $meta = $sth->getColumnMeta($x);
        $field = $meta['name'];
        return $field;
    }

    // Return this:
    // <tr><td>Name</td><td><input type="text" name="name"></td></tr>
    public function formFields(){
	    $fields = '';

        for($x=1;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);

		    if($x < $this->numFields()){
                $fields .= '<tr><td>'.ucFirst($field).'</td><td><input type="text" name="'.$field.'"></td><tr>'."\n";
		    }
	    }
        return $fields;
    }
    
    // Return this: /*  "<td>" . $row['id'] . "</td>" . */
    public function rowFields($row){
	    $fields = '';
        $fld = '';

        for($x=0;$x < $this->numFields();$x++){
            $fld = $this->fieldName($x);

            if($x < $this->numFields() -1){
                $fields .= '<td>' . $row["$fld"] . '</td>'."\n";
	        }else{
                $fields .= '<td>' . $row["$fld"] . '</td>';
            }
        }
        return $fields;
    }

    // Return this: <th>ID</th>
    public function thFields(){
	    $fields = '';

        for($x=0;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);

		    if($x < $this->numFields()){
                $fields .= '<th>'.ucFirst($field).'</th>'."\n";
		    }
	    }
        return $fields;
    }

    // Retur all field names: id,name,email,birthday
    public function fields(){
	    $fields = '';

        for($x=0;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);

            if($x < $this->numFields() -1){
                $fields .= "$field,"."\n";
	        }else{
                $fields .= "$field";
            }
	    }
        return $fields;
    }

    // Return this: /* <tr><td><b>Name</td><td><input type="text" name="name" value="$name"></td></tr> */
    public function fieldsUpdate($reg){
	    $fields = '';

        for($x=1;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);
            ?>
            <tr><td><b><?=ucfirst($field)?></td><td><input type="text" name="<?=$field?>" value="<?=$reg["$field"]?>"></td></tr>
            <?php
        }
    }

    // Return the string with $set for eath field on Update()
    private function updateSet(){
	    $set='';
            
        for($x=0;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);
		    // A linha abaixo gerará a linha: $nome = 'Nome do cliente';
	        $$field = $_POST[$field];

		    // Este if gerará a variável $set contendo "$nome = :$nome, $email = :$email, ...";
		    if($x<$this->numFields()-1){
			    if($x==0) continue;// Não contar o campo id
			    $set .= "$field = :$field,";
		    }else{
			    if($x==0) continue;
			    $set .= "$field = :$field";
		    }
	    }
        return $set;
    }

    // Return the string to insert(): (name, email, birthday) values (:name, :email, :birthday)
    private function inserirStr(){
	    $fields = '';
	    $values = '';

        for($x=1;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);

		    // Este if gera o seguinte código para a variável $fields = "nome, email, data_nasc, cpf" (exemplo para clientes)
		    // E também para a variável $values = ":nome, :email, :data_nasc, cpf"
		    if($x < $this->numFields()-1){
                $fields .= "$field,";
                $values .= ":$field, ";
		    }else{
                $fields .= "$field";
                $values .= ":$field";
		    }
	    }
        $inserirStr = "($fields) VALUES ($values)";
        return $inserirStr;
    }

    // Insert
    public function insert(){
        if(isset($_POST['send'])){

            $sql = "INSERT INTO $this->table {$this->inserirStr()}";
            $sth = $this->pdo->prepare($sql);    

            for($x=1;$x < $this->numFields();$x++){
                $field = $this->fieldName($x);
		        $sth->bindParam(":$field", $_POST["$field"], PDO::PARAM_INT);
	        }
            $execute = $sth->execute();

            if($execute){
                 print "<script>location='index.php?table=$this->table';</script>";
            }else{
                echo 'Error insert dates';
            }
        }
    }

    // Delete
    public function delete($id){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $sql = "DELETE FROM  {$this->table} WHERE id = :id";
            $sth = $this->pdo->prepare($sql);
            $sth->bindParam(':id', $id, PDO::PARAM_INT);   

            if( $sth->execute()){
                print "<script>alert('Register '+$id+' sucessuful deleted!');location='index.php?table=$this->table';</script>";
            }else{
                print "Error on delete register!<br><br>";
            }
        }
    }

    // Update
    public function update(){

        $sql = "UPDATE {$this->table} SET {$this->updateSet()} WHERE id = :id";
        $sth = $this->pdo->prepare($sql);

        for($x=0;$x < $this->numFields();$x++){
            $field = $this->fieldName($x);
            $sth->bindParam(":$field", $_POST["$field"], PDO::PARAM_INT);
	    }

       if($sth->execute()){
            print "<script>location='index.php?table=$this->table';</script>";
       }else{
            print "Error on update register!<br><br>";
       }
    }
}
