<?php
    if(isset($_SESSION['id_usuario']))
        header("Location: /basketmunio/view/html/pagina_principal.php");
    else
        header("Location: /basketmunio/view/html/login.php");
?>