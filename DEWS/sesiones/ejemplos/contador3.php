<?php
    session_start();
    unset($_SESSION["contador"]);
    setcookie(session_name(),"",time()-3600);
    session_destroy();
?>
<html>
<body>
    Sesion terminada
</body>
</html>