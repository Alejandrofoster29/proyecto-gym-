<?php
    session_start();
    include('../modelos/admins.php');
    include('../modelos/config.php');

    $opcion=$_REQUEST['opcion'];
    switch($opcion){
        //crear
        case 1:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            $admin=new Admins($con);

            $admin->usuario=$_POST['usuario'];
            $admin->contrasena=$_POST['contrasena'];

            $res=$admin->leer_contrasena_usuario();
            if($res!=null){
                //echo "REGISTRADO ENCONTRADO";
                //print_r($res);
                $_SESSION['id']=$res[0]->id;
                $_SESSION['usuario']=$res[0]->usuario;
                $_SESSION['contrasena']=$res[0]->contrasena;
                $_SESSION['foto']=$res[0]->foto;
                //include('../../front_end/vistas/private/plantilla/index.php');
                header('Location: ../../front_end/vistas/private/plantilla/index.php');
            }else{
                //echo "NO ENCONTRADO";
                session_unset();
                session_destroy();
                header('Location: ../../front_end/vistas/private/sesion/sesion.php?mensaje=usuario y/o contraseña invalidos');
            }
            header('Location:../../front_end/vistas/private/plantilla/index.php');
        break;
        case 2:
            //include('../../front_end/vistas/public/index.php');
            session_unset();
            session_destroy();
            header('Location: ../../front_end/vistas/public/index.php');
        break;
    }
?>