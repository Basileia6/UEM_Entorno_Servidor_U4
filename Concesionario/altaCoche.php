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
            if (isset($_REQUEST['guardar'])){
                $conexion = mysqli_connect("localhost","root","U7aiks3txX6q3WKzFixP","concesionario")
                    or die("No se ha podido establecer conexion con la base de datos".mysqli_connect_error());

                if($conexion){
                    $marca = $_REQUEST['marca'];
                    $modelo = $_REQUEST['modelo'];
                    $anio = $_REQUEST['anio'];
                    
                    $sql = "INSERT INTO coches (marca,modelo,anio) VALUES('$marca','$modelo',$anio)";

                    if (mysqli_query($conexion,$sql)){
                        echo "<div class='titulo'><h6 class='mb-2'>El coche se ha añadido correctamente<h6></div>";
                    } else{
                        echo "<div class='titulo'><h6 class='mb-2'>No se ha podido añadir el registro:".mysqli_error()."<h6></div>";
                    }
                }
                
                mysqli_close($conexion);            

            } else {
        ?>
        <div class="titulo">
            <h2>Alta Coche</h2>
        </div>
        <form action="#" method="post">
            <div>
                <label class="form-label" for="marca">Marca</label>
                <input class="form-control" type="text" name="marca" required>
            </div>
            <div>
                <label class="form-label" for="modelo">Modelo</label>
                <input class="form-control" type="text" name="modelo" required>
            </div>
            <div>
                <label class="form-label" for="anio">Año</label>
                <input class="form-control" type="number" name="anio" required>
            </div>
            <input class="btn w-100 mt-4" type="submit" value="Guardar" name="guardar">
        </form>
        <?php
            }
        ?>
        <a class="btn w-100 mt-1" href="concesionario.php">Volver al inicio</a>
    </div>
</body>
</html>