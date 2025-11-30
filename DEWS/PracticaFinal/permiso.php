<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    use function PHPSTORM_META\type;

    function tiposPermisos($rutaPermisos, $permiso) //  genera el select necesario con los campos extraidos de un txt
    {
        $misPermisos = fopen($rutaPermisos, 'r');
        if ($misPermisos) {
            $losPermisos = "";
            echo "<select name='permiso'>";
            while (!feof($misPermisos)) {
                $losPermisos .= fgets($misPermisos);
            }

            $pintaPermisos = explode(',', $losPermisos);
            foreach ($pintaPermisos as $key => $value) {
                if ($permiso == $value) {
                    echo "<option value=$value selected>$value</option>";
                } else {
                    echo "<option value=$value>$value</option>";
                }
            }
            echo '</select>';
        } else {
            die('Se ha cerrado el flujo con el archivo');
        }
    }
    function acumulaErrores(&$errores, $valor, $nombreCampo, $mensajeError) //  nos acumula los errores para campos requeridos
    {
        if (empty($valor)) {
            $errores[$nombreCampo] = $mensajeError;
        }
    }
    function pintaErrores(&$errores, $nombreCampo)
    {
        if (isset($errores[$nombreCampo])) {
            echo "<div style='color:red;'>{$errores[$nombreCampo]}</div>";
        }
    }
    $matricula = "";
    $tipo = "";
    $inicio = "";
    $final = "";
    $direccion = "";
    $justificante = "";
    $errores = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricula = $_POST['matri'] ?? "";
        $tipo = $_POST['permiso'] ?? "";
        $inicio = $_POST['Finicio'] ?? "";
        $final = $_POST['Ffin'] ?? "";
        $direccion =  $_POST['direccion'] ?? "";
        $justificante = $_FILES['justif'] ?? null;
        acumulaErrores($errores, $matricula, 'matri', 'Debe indicar la matricula');
        acumulaErrores($errores, $tipo, 'permiso', 'Debe indicar el tipo de permiso');
        if ($tipo==='residente' || $tipo==='huesped') {
            acumulaErrores($errores, $inicio, 'Finicio', 'Debe indicar una fecha de inicio');
            acumulaErrores($errores, $final, 'Ffin', 'Debe indicar una fecha de finalizacion del permiso');
            $fecha1 = new DateTime($inicio);
        $fecha2 = new DateTime($final);
        $intervalo = $fecha1->diff($fecha2);
        if ($tipo == 'residente' && $intervalo->y >= 1) {
            $errores['permiso'] .= 'Un residente no puede exceder el permiso mas de un año';
        }
        if ($tipo === "huesped" && ($intervalo->y > 0 || $intervalo->m >= 1)) {
            $errores["permiso"] .= "Un huésped no puede exceder 1 mes de permiso.";
        }
        }
        
        acumulaErrores($errores, $direccion, 'direccion', 'Debe indicar la  direccion de residencia/hospedaje');
        if ($justificante["error"] !== UPLOAD_ERR_OK) {
            $errores["justif"] = "Debe subir un documento justificante";
        } elseif ($justificante["type"] !== "application/pdf") {
            $errores["justif"] = "El justificante debe ser PDF";
        }
        
        if (empty($errores)) {
            $registro =  "$matricula $direccion $inicio $final\n";
            $registrar = fopen('residentesYHoteles.txt', 'a');
            if ($registrar) {
                fputs($registrar, $registro);
            } else {
                die('Se cerro el  flujo con el fichero');
            }
            echo "<h2 style='color:green;'>Solicitud efectuada con exito</h2>";
            fclose($registrar);
        }
    }
    ?>
    <h2 style="color: green;"></h2>
    <div style="text-align: center;justify-content: center;background-color: yellow;">
        <h1 style="color: blueviolet;">Solicitud de permiso de circulacion</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <label>Matricula</label><br>
            <input type="text" name="matri" value="<?php echo htmlspecialchars($matricula) ?>"><br>
            <?php pintaErrores($errores, 'matri') ?>
            <label>Permiso</label><br>
            <?php tiposPermisos("permisos.txt", $tipo); ?><br>
            <?php pintaErrores($errores, 'permiso') ?>
            <?php 
                if($tipo==='residente' || $tipo==='huesped'){
                    echo "<label>Inicio</label><br>
                    <input type='date' name='Finicio' value='$inicio'><br>";
                    pintaErrores($errores, "Finicio");
                    echo"<label>Fin</label><br>
                    <input type='date' name='Ffin' value='$final'><br>";
                    pintaErrores($errores , "Ffin");
                    echo "<label>Direccion:</label><br>
                    <input type='text' name='direccion' value= '$direccion'><br>";
                    pintaErrores($errores, 'direccion');
                }
            ?>
            <label>Justificante</label><br>
            <input type="file" name="justif"><br>
            <?php pintaErrores($errores, 'justif') ?>
            <input type="submit" value="Enviar">
            <?php if ($errores === "") {
                echo  'Envio correcto de datos';
            } ?>

        </form>
    </div>
</body>

</html>