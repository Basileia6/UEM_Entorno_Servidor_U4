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
                $nbfichero = "Agenda.txt";
                
                $fich = fopen($nbfichero,"a"); //Abrimos el fichero para guardar la info del contacto
                
                //Creamos la cadena para guardarla en el fichero
                $contacto = strip_tags($_REQUEST['nombre']).";".
                            strip_tags($_REQUEST['ap1']).";".
                            strip_tags($_REQUEST['ap2']).";".
                            strip_tags($_REQUEST['tlf']).";".
                            strip_tags($_REQUEST['email']);
                
                fwrite($fich,$contacto.PHP_EOL); //Escribimos el contacto y provocamos el salto de línea
                fclose($fich);

                echo "<div class='titulo'><h6 class='mb-2'>El contacto se ha guardado correctamente<h6></div>";

            } else {
        ?>
        <div class="titulo">
            <h2>Alta Contacto</h2>
        </div>
        <form action="#" method="post">
            <div>
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" name="nombre" required>
            </div>
            <div>
                <label class="form-label" for="ap1">Apellido 1</label>
                <input class="form-control" type="text" name="ap1" required>
            </div>
            <div>
                <label class="form-label" for="ap2">Apellido 2</label>
                <input class="form-control" type="text" name="ap2" required>
            </div>
            <div>
                <label class="form-label" for="tlf">Teléfono</label>
                <input class="form-control" type="number" name="tlf" required>
            </div>
            <div>
                <label class="form-label" for="email">E-mail</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <input class="btn w-100 mt-4" type="submit" value="Guardar" name="guardar">
        </form>
        <?php
            }
        ?>
        <a class="btn w-100 mt-1" href="agenda.php">Volver al inicio</a>
    </div>
</body>
</html>