<?php
function abrirCerrarCurso($con) {
    if (isset($_POST['cerrar'])) {
        $query = $con->prepare("UPDATE cursos SET abierto=0 WHERE nombre=?");
        $query->execute([$_POST['cerrar']]);
        header("Location: panelAdmin.php?token=" . $_SESSION['token']);
        exit();
    } elseif (isset($_POST['abrir'])) {
        $query = $con->prepare("UPDATE cursos SET abierto=1 WHERE nombre=?");
        $query->execute([$_POST['abrir']]);
        header("Location: panelAdmin.php?token=" . $_SESSION['token']);
        exit();
    }
}
function eliminarCurso($con) {
    if (isset($_POST['eliminar'])) {
        $query = $con->prepare("DELETE FROM cursos WHERE nombre=?");
        $query->execute([$_POST['eliminar']]);
        header("Location: panelAdmin.php?token=" . $_SESSION['token']);
        exit();
    }
}
function crearCurso($con) {
    if (isset($_POST['crear'])) {
        $codigo = $_POST['codigo'];
        $nombrecurso = $_POST['nombrecurso'];
        $abierto = isset($_POST['abierto']) ? 1 : 0;
        $numeroplazas = $_POST['numeroplazas'];
        $plazoinscripcion = $_POST['plazoinscripcion'];
        $query = $con->prepare("INSERT INTO cursos (codigo, nombre, abierto, numeroplazas, plazoinscripcion) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$codigo, $nombrecurso, $abierto, $numeroplazas, $plazoinscripcion]);
        header("Location: panelAdmin.php?token=" . $_SESSION['token']);
        exit();
    }
}
function admitirSolicitante($con) {
    if (isset($_POST['admitir'])) {
        $dni = $_POST['dni'];
        $codigocurso = $_POST['codigocurso'];
        $query = $con->prepare("UPDATE solicitudes SET admitido=1 WHERE dni=? AND codigocurso=?");
        $query->execute([$dni, $codigocurso]);
        header("Location: listadoSolicitudes.php?token=" . $_SESSION['token'] . "&curso=" . $codigocurso);
        exit();
    }
}
?>