<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en PHP y MySQL</title>
    <!-- Incluiendo Bootstrap al proyecto en el CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script>
        //funcion en donde nos muestra una pantalla pregunatando si estamos seguro de eliminar el registro selecionado
        function eliminar(){
            var respuesta=confirm("Estas seguro de eliminar este registro?");
            return respuesta;
        }
    </script>

    <h1 class="text-center p-3 bg-info" style="color:white">PHP CRUD</h1>
    <?php
        include "controlador/eliminar_personas.php";
    ?>
    <div class="containte-fluid row">

        <!-- Formulario -->
        <form class="col-4 p-3 m-2" method="POST" style="border: thin solid black">
            <h3 class="text-center text-secondary">Registro de Personas</h3>
            <?php 
            include "modelo/conexion.php";
            include "controlador/registro_persona.php";
            ?>
            <div class="mb-3">
                <label for="InputText" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre">
            </div>
            <div class="mb-3">
                <label for="InputText" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="Apellidos">
            </div>
            <div class="mb-3">
                <label for="InputText" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="Telefono">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>
       
        <!-- Tabla de Registros -->
        <div class="col-7 p-4 m-2" style="border: thin solid black">
            <table class="table caption-top">
                <thead class="bg-info">
                <!--Encabezado de la tabla-->
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <!--Cuerpo de la tabla donde muestra el informacion de BD-->
                <tbody>
                    <?php 
                        include "modelo/conexion.php";
                        $sql=$conexion->query("SELECT * FROM personas");
                        while($datos=$sql->fetch_object())
                        { ?>
                                <tr>
                                <td><?php echo "$datos->Id" ?></td>
                                <td><?php echo "$datos->Nombre" ?></td>
                                <td><?php echo "$datos->Apellidos" ?></td>
                                <td><?php echo "$datos->Telefono" ?></td>
                                <!-- Boton de editar y eliminar-->
                                <td>
                                    <a href="modificar_personas.php?id=<?php echo $datos->Id ?>" class="btn btn-small btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg></a>
                                    <a onclick="return eliminar()" href="index.php?id=<?php echo $datos->Id ?>" class="btn btn-small btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg></a>
                                </td>
                                </tr>
                       <?php }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!--Agregando bootstrap al JS con Popper-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 
