<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="principal">
        <?php
            if (isset($_REQUEST['borrar'])){
                $conexion = mysqli_connect("localhost","root","U7aiks3txX6q3WKzFixP","concesionario")
                        or die("No se ha podido establecer conexion con la base de datos".mysqli_connect_error());

                if($conexion){
                    $sql = "SELECT * from coches where id =".$_REQUEST['id'];

                    $result = mysqli_query($conexion,$sql);

                    if (mysqli_num_rows($result)>0){
                        $sql = "Delete from coches where id =".$_REQUEST['id'];
                        if (mysqli_query($conexion,$sql)){
                            echo "<div class='titulo'><h6 class='mb-2'>El registro se ha borrado correctamente<h6></div>";
                        } else {
                            echo "<div class='titulo'><h6 class='mb-2'>El registro no se ha podido borrar:".mysqli_error()."<h6></div>";
                        }
                    } else{
                        echo "<div class='titulo'><h6 class='mb-2'>No se ha encontrado el registro<h6></div>";
                    }
                }   
    
                mysqli_close($conexion);
            } else {
        ?>
        <div class="titulo">
            <h2>Búsqueda Contacto</h2>
        </div>
        <form action="#" method="post">
            <div>
                <label class="form-label" for="id">Id del coche</label>
                <input class="form-control" type=" number" name="id" required>
            </div>
            <input class="btn w-100 mt-4" type="submit" value="Borrar" name="borrar">
        </form>
        <?php
            }
        ?>
        <a class="btn w-100 mt-1" href="concesionario.php">Volver al inicio</a>
    </div>
</body>
</html>