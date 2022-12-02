<?php
include('crud.php');

class Equipo implements CRUD
{
    public $id;
    public $nombre;
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
            $sql = "INSERT INTO equipo (nombre, foto, estatus)
                VALUES (:nombre, :foto, :estatus)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
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
            $sql = "UPDATE equipo SET nombre=:nombre,  
            foto=:foto, estatus=:estatus WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':nombre', $this->nombre);
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
            $sql = "DELETE FROM equipo  WHERE id=:id";
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
            $sql = "SELECT * FROM equipo WHERE estatus='Activo'"; //WHERE estatus='ACTIVO'
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
            $sql = "SELECT * FROM equipo where id=:id AND estatus='Activo'"; //AND estatus='ACTIVO'
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