<?php 
//Si el usuario presiona el boton de modificar, aqui verifica si alguno de los campos estan vacios
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["Nombre"]) and !empty($_POST["Apellidos"]) and !empty($_POST["Telefono"]))
    {
        //Encase de que no estan vacios entonces no permite realizar el modificarion utilizando los campos en el cuadro de texto
        $id=$_POST["Id"];
        $nombre=$_POST["Nombre"];
        $apellidos=$_POST["Apellidos"];
        $telefono=$_POST["Telefono"];
        //consulta donde actualiza en el tabla de personas el nombre, apellido y el telefono con que el id es igual
        $sql=$conexion->query("UPDATE personas SET Nombre='$nombre', Apellidos='$apellidos', Telefono='$telefono' WHERE Id=$id");
        if($sql==1){
            header("location:index.php");
        }else{
            echo "<div class='alert alert-danger'>Error al modificar datos del persona</div>";
        }

    }else{
        echo "<div class='alert alert-warning'>Campos vacios</div>";
    }
}

?>