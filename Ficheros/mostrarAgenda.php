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
            <th>Nombre</th>
            <th>Apellido 1</th>
            <th>Apellido 2</th>
            <th>Teléfono</th>
            <th>Email</th>
        </tr>
    <?php
        $nbfichero = "Agenda.txt";
                
        $fich = fopen($nbfichero,"r"); //Abrimos el fichero para leer la info de los contactos
        
        while (!feof($fich)){
            $linea = fgets($fich);
            $datos = explode(";",$linea);
            echo "<tr>";
            foreach ($datos as $dato){
                echo "<td>$dato</td>";
            }
            echo "</tr>";
        }
        
        fclose($fich);
    ?>
    </table>
    <div class="vuelta mt-5">
        <a class="btn w-50 mt-1" href="agenda.php">Volver al inicio</a>
    </div>
    </div>
</body>
</html>