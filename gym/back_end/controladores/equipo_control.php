<?php
    include('../modelos/equipo.php');
    include('../modelos/config.php');

    $target_dir = "../../front_end/vistas/private/imagenes/equipo/";
    $file_name='default.png';
    $opcion=$_POST['opcion'];

    switch($opcion){
        //crear
        case 1:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            $equipo=new Equipo($con);

            $equipo->nombre=$_POST['nombre'];
            include('subir_archivo.php');
            $equipo->foto=$file_name;
            $equipo->estatus='Activo';

            $res=$equipo->crear();
            if($res==1){
                echo "REGISTRADO CON EXITO!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/equipo/index.php');
        break;
        case 2:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia equipo$equipo
            $equipo=new Equipo($con);

            $equipo->id=$_POST['id'];
            $equipo->nombre=$_POST['nombre'];
            include('subir_archivo.php');
            if($_FILES['foto']['size']<=0){
                $equipo->foto=$_POST['actual'];
            }else{
                $equipo->foto=$file_name;
            }
            $equipo->estatus=$_POST['estatus'];

            $res=$equipo->actualizar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/equipo/".$_POST['actual']);
                echo "DATOS ACTUALIZADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/equipo/index.php');
        break;
        case 3:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia equipo$equipo
            $equipo=new Equipo($con);

            $equipo->id=$_POST['id'];
            

            $res=$equipo->borrar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/Equipo/".$_POST['actual']);
                echo "DATOS BORRADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/equipo/index.php');
        break;
    }
?>