<?php
include('crud.php');

class Entrenadores implements CRUD
{
    public $id;
    public $nombre;
    public $apellidos;
    public $edad;
    public $foto;
    public $estatus;

    public $con;

    public function __construct($con)
    {
        $this->con = $con;
    }


    public function crear()
    {
        try {
            $sql = "INSERT INTO entrenadores (nombre, apellidos, edad,foto, estatus)
                VALUES (:nombre, :apellidos, :edad, :foto, :estatus)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellidos', $this->apellidos);
            $stmt->bindParam(':edad', $this->edad);
            $stmt->bindParam(':foto', $this->foto);
            $stmt->bindParam(':estatus', $this->estatus);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->con = null;
        }
    }
    public function actualizar()
    {
        try {
            $sql = "UPDATE entrenadores SET nombre=:nombre, apellidos=:apellidos, 
            edad=:edad, foto=:foto, estatus=:estatus WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellidos', $this->apellidos);
            $stmt->bindParam(':edad', $this->edad);
            $stmt->bindParam(':foto', $this->foto);
            $stmt->bindParam(':estatus', $this->estatus);
            $stmt->bindParam('id', $this->id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->con = null;
        }
    }
    public function borrar()
    {
        try {
            $sql = "DELETE FROM entrenadores  WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam('id', $this->id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->con = null;
        }
    }
    public function leer_todos()
    {
        try {
            $sql = "SELECT * FROM entrenadores WHERE estatus='Activo'"; //WHERE estatus='ACTIVO'
            $stmt = $this->con->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->con = null;
        }
    }
    public function leer_uno_id()
    {
        try {
            $sql = "SELECT * FROM entrenadores where id=:id AND estatus='Activo'" ; //AND estatus='ACTIVO'
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->con = null;
        }
    }
    public function leer_varios_campo()
    {
        
    }
}
?> 