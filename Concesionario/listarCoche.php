<!DOCTYPE html>
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
    <div>
    <div class="titulo mt-5">
            <h2>Lista de Contactos</h2>
    </div>
    <table class="mt-5">
        <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
        </tr>
    <?php
        $conexion = mysqli_connect("localhost","root","U7aiks3txX6q3WKzFixP","concesionario")
        or die("No se ha podido establecer conexion con la base de datos".mysqli_connect_error());

        if($conexion){
            $sql = "SELECT * from coches";

            $result = mysqli_query($conexion,$sql);

            if (mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    foreach ($row as $dato){
                        echo "<td>$dato</td>";
                    }
                    echo "</tr>";
                }
            } else{
            echo "<div class='titulo'><h6 class='mb-2'>No hay registros que mostrar:".mysqli_error()."<h6></div>";
            }
        }
    
        mysqli_close($conexion);
    ?>
    </table>
    <div class="vuelta mt-5">
        <a class="btn w-50 mt-1" href="concesionario.php">Volver al inicio</a>
    </div>
    </div>
</body>
</html>