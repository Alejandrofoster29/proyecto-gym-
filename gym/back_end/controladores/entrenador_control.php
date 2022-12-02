<?php
    include('../modelos/entrenadores.php');
    include('../modelos/config.php');

    $target_dir = "../../front_end/vistas/private/imagenes/entrenadores/";
    $file_name='default.png';
    $opcion=$_POST['opcion'];

    switch($opcion){
        //crear
        case 1:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            $entrenador=new Entrenadores($con);

            $entrenador->nombre=$_POST['nombre'];
            $entrenador->apellidos=$_POST['apellidos'];
            $entrenador->edad=$_POST['edad'];
            include('subir_archivo.php');
            $entrenador->foto=$file_name;
            $entrenador->estatus='Activo';

            $res=$entrenador->crear();
            if($res==1){
                echo "REGISTRADO CON EXITO!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/entrenador/index.php');
        break;
        case 2:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia admin$entrenador
            $entrenador=new Entrenadores($con);

            $entrenador->id=$_POST['id'];
            $entrenador->nombre=$_POST['nombre'];
            $entrenador->apellidos=$_POST['apellidos'];
            $entrenador->edad=$_POST['edad'];
            include('subir_archivo.php');
            if($_FILES['foto']['size']<=0){
                $entrenador->foto=$_POST['actual'];
            }else{
                $entrenador->foto=$file_name;
            }
            $entrenador->estatus=$_POST['estatus'];

            $res=$entrenador->actualizar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/entrenadores/".$_POST['actual']);
                echo "DATOS ACTUALIZADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/entrenador/index.php');
        break;
        case 3:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia entrenador
            $entrenador=new Entrenadores($con);

            $entrenador->id=$_POST['id'];
            
            $res=$entrenador->borrar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/entrenadores/".$_POST['actual']);
                echo "DATOS BORRADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/entrenador/index.php');
        break;
    }
?>