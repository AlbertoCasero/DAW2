<?php
function ordenarSolicitudesPorPuntos($codigoCurso, $numPlazas)
{
    try {
        $con = new PDO('mysql:host=localhost;dbname=cursoscp;charset=utf8', 'victor', '1234');
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consulta = "SELECT s.dni, s.nombre, s.apellidos, s.puntos, 
                (SELECT COUNT(*) 
                 FROM solicitudes solicitud 
                 WHERE solicitud.dni = s.dni 
                 AND solicitud.admitido = 1 and codigoCurso!= :codigo) as admitidosPrev
                 FROM solicitantes s 
                WHERE s.dni IN (SELECT dni FROM solicitudes WHERE codigocurso = :codigo) 
                ORDER BY admitidosPrev ASC, s.puntos DESC 
                LIMIT :limite";
        $stmt = $con->prepare($consulta);
        //Reemplazamos esos valores por las variables y ajustamos los valores para que sean 
        $stmt->bindValue(':codigo', $codigoCurso, PDO::PARAM_INT);
        $stmt->bindValue(':limite', $numPlazas, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // En producción, mejor loguear el error y no mostrarlo
        error_log("Ha ocurrido un error en la base de datos");
        return [];
    }
}