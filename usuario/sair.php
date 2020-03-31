<?php

session_start();
session_destroy();
echo '<script language= "JavaScript">
location.href="../pages/index.php";
alert("Saída concluída!");
</script>';

