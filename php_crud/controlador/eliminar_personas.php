<?php
    include "modelo/conexion.php";
    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        //consulta donde elimina en el tabla de personas el nombre, apellido y el telefono y el id del registro.
        $sql=$conexion->query("DELETE FROM personas WHERE Id=$id");
        if($sql == 1){
            echo "<div class='alert alert-success'> Persona eliminado correctamente</div>";
        }else{
            echo "<div class='alert alert-danger'> Error al eliminar</div>";
        }
    }

?>