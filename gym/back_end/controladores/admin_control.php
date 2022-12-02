<?php
    include('../modelos/admins.php');
    include('../modelos/config.php');

    $target_dir = "../../front_end/vistas/private/imagenes/admins/";
    $file_name='default.png';
    $opcion=$_POST['opcion'];

    switch($opcion){
        //crear
        case 1:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            $admin=new Admins($con);

            $admin->usuario=$_POST['usuario'];
            $admin->contrasena=$_POST['contrasena'];
            //$admin->foto=$_POST['foto'];
            include('subir_archivo.php');
            $admin->foto=$file_name;
            $admin->estatus='Activo';

            $res=$admin->crear();
            if($res==1){
                echo "REGISTRADO CON EXITO!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/admin/index.php');
        break;
        case 2:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia admin$admin
            $admin=new Admins($con);

            $admin->id=$_POST['id'];
            $admin->usuario=$_POST['usuario'];
            $admin->contrasena=$_POST['contrasena'];
            include('subir_archivo.php');
            if($_FILES['foto']['size']<=0){
                $admin->foto=$_POST['actual'];
            }else{
                $admin->foto=$file_name;
            }
            $admin->estatus=$_POST['estatus'];

            $res=$admin->actualizar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/admins/".$_POST['actual']);
                echo "DATOS ACTUALIZADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/admin/index.php');
        break;
        case 3:
            $conexion=new Conexion();
            $con=$conexion->getConection();
            //instancia admin$admin
            $admin=new Admins($con);

            $admin->id=$_POST['id'];
            

            $res=$admin->borrar();
            if($res==1){
                unlink("../../front_end/vistas/private/imagenes/admins/".$_POST['actual']);
                echo "DATOS BORRADOS!!";
            }else{
                echo $res;
            }
            header('Location: ../../front_end/vistas/private/admin/index.php');
        break;
    }
?>