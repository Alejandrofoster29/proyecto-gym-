<?php
include('crud.php');

class Admins implements CRUD
{
    public $id;
    public $usuario;
    public $contrasena;
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
            $sql = "INSERT INTO admins (usuario, contrasena, foto, estatus)
                VALUES (:usuario, :contrasena, :foto, :estatus)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':contrasena', $this->contrasena);
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
            $sql = "UPDATE admins SET usuario=:usuario, contrasena=:contrasena, 
            foto=:foto, estatus=:estatus WHERE id=:id";
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':contrasena', $this->contrasena);
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
            $sql = "DELETE FROM admins  WHERE id=:id";
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
            $sql = "SELECT * FROM admins WHERE estatus='Activo'"; //WHERE estatus='ACTIVO'
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
            $sql = "SELECT * FROM admins where id=:id AND estatus='Activo'"; //AND estatus='ACTIVO'
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
    public function leer_contrasena_usuario()
    {
        try {
            $sql = "SELECT * FROM admins where contrasena=:contrasena AND usuario=:usuario AND estatus='Activo'"; //AND estatus='ACTIVO'
            $stmt = $this->con->prepare($sql);
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':contrasena', $this->contrasena);
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();
            $res = $stmt->fetchAll();
            if ($stmt->rowCount() > 0) {
                return $res;
            } else {
                return $res = null;
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $this->con = null;
        }
    }
}
?> 