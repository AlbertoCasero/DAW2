<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar permiso</title>
</head>

<body>
    <?php

    function acumulaErrores(&$errores, $valor, $nombreCampo, $mensajeError)
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
    $tipo = $_POST['permiso'] ?? "";
    $inicio = "";
    $final = "";
    $direccion = "";
    $detalle = "";
    $horaInicio = "";
    $horaFinal = "";
    $justificante = null;
    $errores = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['solicitar'])) {

        // Campos comunes
        $matricula = $_POST['matricula'] ?? "";
        $inicio = $_POST['Finicio'] ?? "";
        $final = $_POST['Ffin'] ?? "";
        $direccion = $_POST['direccion'] ?? "";

        switch ($tipo) {
            case 'taxis':
                $detalle = $_POST['conductor'] ?? "";
                break;

            case 'servicios':
                $detalle = $_POST['servicio'] ?? "";
                break;

            case 'vehiculosEMT':
                $detalle = $_POST['trayecto'] ?? "";
                break;

            case 'logistica':
                $detalle = $_POST['empresa'] ?? "";
                $horaInicio = $_POST['horaInicio'] ?? "";
                $horaFinal = $_POST['horaFinal'] ?? "";
                break;

            default:
                $detalle = "";
        }

        $justificante = $_FILES['justif'] ?? null;

        // Validaciones generales
        acumulaErrores($errores, $matricula, 'matricula', 'Debe indicar la matrícula');

        // Validaciones especiales por tipo
        if ($tipo === 'residente' || $tipo === 'huesped') {

            acumulaErrores($errores, $inicio, 'Finicio', 'Debe indicar una fecha de inicio');
            acumulaErrores($errores, $final, 'Ffin', 'Debe indicar una fecha de finalización');

            if (!empty($inicio) && !empty($final)) {

                $fecha1 = new DateTime($inicio);
                $fecha2 = new DateTime($final);
                $intervalo = $fecha1->diff($fecha2);

                if ($tipo == 'residente' && $intervalo->y >= 1) {
                    $errores['permiso'] = 'Un residente no puede tener más de un año de permiso';
                }

                if ($tipo == 'huesped' && ($intervalo->y > 0 || $intervalo->m >= 1)) {
                    $errores['permiso'] = 'Un huésped no puede exceder 1 mes de permiso';
                }
            }

            acumulaErrores($errores, $direccion, 'direccion', 'Debe indicar la dirección');
        }

        // Mensajes específicos
        $mensajes = [
            'taxis'        => "Debe indicar el nombre del conductor",
            'servicios'    => "Debe indicar el tipo de servicio",
            'vehiculosEMT' => "Debe indicar la ruta",
            'logistica'    => "Debe indicar la empresa"
        ];

        if (isset($mensajes[$tipo])) {
            acumulaErrores($errores, $detalle, $tipo, $mensajes[$tipo]);
        }

        // Validación del PDF
        if ($justificante["error"] !== UPLOAD_ERR_OK) {
            $errores["justif"] = "Debe subir un justificante";
        } elseif ($justificante["type"] !== "application/pdf") {
            $errores["justif"] = "El justificante debe ser PDF";
        }

        // Si NO hay errores, guardamos en fichero
        if (empty($errores)) {

            if ($tipo === 'residente' || $tipo === 'huesped') {
                $registro = "$matricula $direccion $inicio $final\n";
                $archivo = 'residentesYHoteles.txt';
            } else if ($tipo === 'logistica') {
                $registro = "$matricula $detalle \n";
                $archivo = $tipo . ".txt";
            }

            $registrar = fopen($archivo, 'a');

            if ($registrar) {
                fputs($registrar, $registro);
                fclose($registrar);
                echo "<h2 style='color:green;'>Solicitud efectuada con éxito</h2>";
            } else {
                die('Error al abrir el archivo');
            }
        }
    }
    ?>

    <h1>Solicitud de permiso: <?php echo $tipo; ?></h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

        <!-- Mantener tipo entre recargas -->
        <input type="hidden" name="permiso" value="<?php echo $tipo; ?>">

        <label>Matrícula:</label><br>
        <input type="text" name="matricula" value="<?php echo htmlspecialchars($matricula); ?>"><br>
        <?php pintaErrores($errores, "matricula"); ?>

        <?php

        // Campos especiales
        if ($tipo === 'residente' || $tipo === 'huesped') {

            echo "<label>Inicio:</label><br>
        <input type='date' name='Finicio' value='$inicio'><br>";
            pintaErrores($errores, "Finicio");

            echo "<label>Fin:</label><br>
        <input type='date' name='Ffin' value='$final'><br>";
            pintaErrores($errores, "Ffin");

            echo "<label>Dirección:</label><br>
        <input type='text' name='direccion' value='$direccion'><br>";
            pintaErrores($errores, "direccion");
        }

        if ($tipo === 'taxis') {
            echo "<label>Conductor:</label><br>
        <input type='text' name='conductor' value='$detalle'><br>";
            pintaErrores($errores, "taxis");
        }

        if ($tipo === 'servicios') {
            echo "<label>Servicio:</label><br>
        <input type='text' name='servicio' value='$detalle'><br>";
            pintaErrores($errores, "servicios");
        }

        if ($tipo === 'vehiculosEMT') {
            echo "<label>Trayecto:</label><br>
        <input type='text' name='trayecto' value='$detalle'><br>";
            pintaErrores($errores, "vehiculosEMT");
        }

        if ($tipo === 'logistica') {
            echo "<label>Empresa:</label><br>
        <input type='text' name='empresa' value='$detalle'><br>";
            pintaErrores($errores, "logistica");
        }
        ?>

        <label>Justificante (PDF)</label><br>
        <input type="file" name="justif"><br>
        <?php pintaErrores($errores, "justif"); ?>

        <br><br>
        <input type="submit" name="solicitar" value="Solicitar">

    </form>

</body>

</html>