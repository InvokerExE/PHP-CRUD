<?php
include "modelo/conexion.php";
//agranado el id y despues buscandolo en el tabla de personas
$id=$_GET["id"];
$sql=$conexion->query("SELECT * FROM personas where Id=$id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Formulario de modificar el regsitro -->
    <form class="col-4 p-3 m-auto" method="POST">
            <h3 class="text-center text-secondary">Modificar el registro de persona</h3>
            <input type="hidden" name="Id" value=<?php echo $_GET["id"] ?>>
            <?php 
            include "controlador/modificar_personas.php";
                while($datos=$sql->fetch_object()){ ?>
            <div class="mb-3">
                <label for="InputText" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre" value=<?php echo "$datos->Nombre"?>>
            </div>
            <div class="mb-3">
                <label for="InputText" class="form-label">Apellido(s)</label>
                <input type="text" class="form-control" name="Apellidos" value=<?php echo "$datos->Apellidos"?>>
            </div>
            <div class="mb-3">
                <label for="InputText" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="Telefono" value=<?php echo "$datos->Telefono"?>>
            </div>

              <?php  }
            ?>

            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
        </form>
</body>
</html>