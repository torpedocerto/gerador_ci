<?php
include "../controll/_autoload.php";
if (isset($_POST['tables_list'])) {
    $gerador = $obj->processar_geracao_codigo($_POST['tables_list']);
    $obj->easyPrint($gerador);
}
include "header.php";
include "generate_content.php";
include "footer.php";

?>
