<?php
    include('../modelos/usuarios.php');
    include('../modelos/config.php');

    $target_dir = "../../front_end/vistas/private/imagenes/usuarios/";
    $file_name='default.png';
    $opcion=$_POST['opcion'];

    switch($opcion){
        //crear
        case 1:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            $usuario=new Usuarios($con);

            $usuario->nombre=$_POST['nombre'];
            $usuario->apellidos=$_POST['apellidos'];
            $usuario->edad=$_POST['edad'];
            $usuario->estatura=$_POST['estatura'];
            $usuario->peso=$_POST['peso'];
            include('subir_archivo.php');
            $usuario->foto=$file_name;
            $usuario->estatus='Activo';

            $res=$usuario->crear();
            if($res==1){
                echo "REGISTRADO CON EXITO!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/usuario/index.php');
        break;
        case 2:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia usuario$usuario
            $usuario=new Usuarios($con);

            $usuario->id=$_POST['id'];
            $usuario->nombre=$_POST['nombre'];
            $usuario->apellidos=$_POST['apellidos'];
            $usuario->edad=$_POST['edad'];
            $usuario->estatura=$_POST['estatura'];
            $usuario->peso=$_POST['peso'];
            include('subir_archivo.php');
            if($_FILES['foto']['size']<=0){
                $usuario->foto=$_POST['actual'];
            }else{
                $usuario->foto=$file_name;
            }
            $usuario->estatus=$_POST['estatus'];

            $res=$usuario->actualizar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/usuarios/".$_POST['actual']);
                echo "DATOS ACTUALIZADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/usuario/index.php');
        break;
        case 3:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia usuario$usuario
            $usuario=new Usuarios($con);

            $usuario->id=$_POST['id'];
            

            $res=$usuario->borrar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/usuarios/".$_POST['actual']);
                echo "DATOS BORRADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/usuario/index.php');
        break;
    }
?>