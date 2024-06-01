<?php
//Si el usuario presiona el boton de registar, aqui verifica si alguno de los campos estan vacios
if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["Nombre"]) and !empty($_POST["Apellidos"]) and !empty($_POST["Telefono"])){
        //echo "Todo fue registrado";
        $nombre=$_POST["Nombre"];
        $apellidos=$_POST["Apellidos"];
        $telefono=$_POST["Telefono"];
        //consulta donde ingresa el nombre apellido y telefono al base de datos con un id auto incrementable
        $sql=$conexion->query("INSERT INTO personas(Nombre,Apellidos,Telefono) VALUES('$nombre','$apellidos','$telefono')");
        if($sql == 1)
        {
            echo '<div class="alert alert-success">Persona registrado correctament</div>';
        }else{
            echo '<div class="alert alert-danger">Error al registrar persona</div>';
        }

    }else{
        echo '<div class="alert alert-warning">Algunos de los campos estan vacios</div>';
    }
}

?>