<?php
include('crud.php');

class Usuarios implements CRUD
{
    public $id;
    public $nombre;
    public $apellidos;
    public $edad;
    public $estatura;
    public $peso;
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
            $sql = "INSERT INTO usuarios (nombre, apellidos, edad, estatura, peso, foto, estatus)
                VALUES (:nombre, :apellidos, :edad, :estatura, :peso, :foto, :estatus)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellidos', $this->apellidos);
            $stmt->bindParam(':edad', $this->edad);
            $stmt->bindParam(':estatura', $this->estatura);
            $stmt->bindParam(':peso', $this->peso);
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
            $sql = "UPDATE usuarios SET nombre=:nombre, apellidos=:apellidos, edad=:edad,
            estatura=:estatura, peso=:peso, foto=:foto, estatus=:estatus WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->bindParam(':apellidos', $this->apellidos);
            $stmt->bindParam(':edad', $this->edad);
            $stmt->bindParam(':estatura', $this->estatura);
            $stmt->bindParam(':peso', $this->peso);
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
            $sql = "DELETE FROM usuarios  WHERE id=:id";
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
            $sql = "SELECT * FROM usuarios WHERE estatus='Activo'"; //WHERE estatus='ACTIVO'
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
            $sql = "SELECT * FROM usuarios where id=:id AND estatus='Activo'"; //AND estatus='ACTIVO'
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