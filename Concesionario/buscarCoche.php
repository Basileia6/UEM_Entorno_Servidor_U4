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
            if (isset($_REQUEST['buscar'])){
                
                $conexion = mysqli_connect("localhost","root","U7aiks3txX6q3WKzFixP","concesionario")
                        or die("No se ha podido establecer conexion con la base de datos".mysqli_connect_error());

                if($conexion){
                    $marca = $_REQUEST['marca'];
                    $modelo = $_REQUEST['modelo'];
                    
                    if($marca && $modelo){
                        $sql = "SELECT * from coches where marca = '$marca' and modelo = '$modelo'";
                    } else if($marca){
                        $sql = "SELECT * from coches where marca = '$marca'";
                    } else if($modelo){
                        $sql = "SELECT * from coches where modelo = '$modelo'";
                    } else {
                        $sql = "SELECT * from coches";
                    }

                    $result = mysqli_query($conexion,$sql);

                    if (mysqli_num_rows($result)>0){
                    ?>
                    <table class="mt-5">
                    <tr>
                        <th>Id</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                    </tr>
                    <?php    
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            foreach ($row as $dato){
                                echo "<td>$dato</td>";
                            }
                            echo "</tr>";
                        }
                    } else{
                        echo "<div class='titulo'><h6 class='mb-2'>No hay resultados que coincidan en la búsqueda<h6></div>";
                    }
                }   
    
                mysqli_close($conexion);
                echo "<a class='btn w-100 mt-3' href='buscarCoche.php'>Nueva búsqueda</a>";
            } else {
        ?>
        <div class="titulo">
            <h2>Búsqueda Contacto</h2>
        </div>
        <form action="#" method="post">
            <div>
                <label class="form-label" for="marca">Marca</label>
                <input class="form-control" type="text" name="marca">
            </div>
            <div>
                <label class="form-label" for="modelo">Modelo</label>
                <input class="form-control" type="text" name="modelo">
            </div>
            <input class="btn w-100 mt-4" type="submit" value="Buscar" name="buscar">
        </form>
        <?php
            }
        ?>
        <a class="btn w-100 mt-1" href="concesionario.php">Volver al inicio</a>
    </div>
</body>
</html>