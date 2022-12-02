<?php

//echo "HOLA MUNDO";

class Conexion{
    private $con;

    public function __CONSTRUCT(){

	try {
		
		$this->con=new PDO("mysql:host=localhost; dbname=gym", 'root','');
        //$this->con= new PDO("sqlsrv:Server=foo-sql,1433;Database=mydb", 'sa' , 'secreto');
	    // set the PDO error mode to exception
	    $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    //echo "Connected successfully";
	
	}catch(PDOException $e) {
	    //echo "Error: " . $e->getMessage();
	}
}

public function getConection(){
	 	return $this->con;
	}
}


//$con=new Conexion();