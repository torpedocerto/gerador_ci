<?php
include_once "_autoload.php";
if (isset($_POST['method'])) {
    if ($_POST['method'] == 'checar_conexao_db') {
        $_SESSION['conexao'] = $_POST;
        $conn_db = $obj->checar_conexao_db();
        if ($conn_db) {
            $listar_dbs = $obj->sql_pega_lista_dbs($conn_db);
            $ret = $listar_dbs;
        }
        else {
            $ret = false;
        }
        $ret = json_encode(&$ret);
    }
    if ($_POST['method'] == 'mostrar_tabelas') {
        $ret = false;
        $_SESSION['db'] = $_POST['db'];
        $conn_db = $obj->checar_conexao_db();
        $lst = $obj->pegar_lista_tabelas($conn_db);
        if (!empty($lst)) {
            $det = $obj->pegar_detalhes_tabelas($lst, $conn_db);
            $ret = $obj->processar_html_tabelas($det);
        }
    }
    print_r($ret);
}
?>
