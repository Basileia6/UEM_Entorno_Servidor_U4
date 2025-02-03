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
                $nbfichero = "Agenda.txt";
                $encontrado = false;
                $nombre = $_REQUEST['nombre'];
                
                $fich = fopen($nbfichero,"r"); //Abrimos el fichero para guardar la info del contacto
                
                while (!feof($fich) && !$encontrado){
                    $linea = fgets($fich);
                    $datos = explode(";",$linea);
                    if($datos[0] == $nombre){
                        $encontrado = true;
                        echo "<div class='titulo'><h6 class='mb-2'>Los datos son los siguientes:<h6></div>";
                        echo "Nombre: ".$datos[0]."<br>";
                        echo "Apellidos: ".$datos[1]." ".$datos[2]."<br>";
                        echo "Teléfono: ".$datos[3]."<br>";
                        echo "Email: ".$datos[4]."<br>";
                    }
                }

                if (!$encontrado){//Si hemos llegado al final del fichero y no hemos encontrado el contacto
                    echo "<div class='titulo'><h6 class='mb-2'>Contacto no encontrado<h6></div>";
                }
                echo "<a class='btn w-100 mt-3' href='buscarContacto.php'>Nueva búsqueda</a>";
            } else {
        ?>
        <div class="titulo">
            <h2>Búsqueda Contacto</h2>
        </div>
        <form action="#" method="post">
            <div>
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" required>
            </div>
            <input class="btn w-100 mt-4" type="submit" value="Buscar" name="buscar">
        </form>
        <?php
            }
        ?>
        <a class="btn w-100 mt-1" href="agenda.php">Volver al inicio</a>
    </div>
</body>
</html>