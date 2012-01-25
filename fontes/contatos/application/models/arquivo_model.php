<?php

class Arquivo_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_cli_id                         = "";
    var $_nome                           = "";
    var $_caminho                        = "";
    var $_descricao                      = "";
    var $_tipo                           = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_arquivo() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'cli_id'               => $this->_cli_id, 
                'nome'                 => $this->_nome, 
                'caminho'              => $this->_caminho, 
                'descricao'            => $this->_descricao, 
                'tipo'                 => $this->_tipo, 
                'status'               => $this->_status
        );
        $this->db->insert('arquivo', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_arquivo($arquivo_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $arquivo_key);
        $rec    =   $this->db->get('arquivo');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_cli_id               = $ret[0]['cli_id'];
            $this->_nome                 = $ret[0]['nome'];
            $this->_caminho              = $ret[0]['caminho'];
            $this->_descricao            = $ret[0]['descricao'];
            $this->_tipo                 = $ret[0]['tipo'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_arquivo($arquivo_key) {
        $ret    = 0;
        $data   = array(
                'cli_id'               => $this->_cli_id, 
                'nome'                 => $this->_nome, 
                'caminho'              => $this->_caminho, 
                'descricao'            => $this->_descricao, 
                'tipo'                 => $this->_tipo, 
                'status'               => $this->_status
        );
        $this->db->where('id', $arquivo_key);
        $this->db->update('arquivo', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_arquivo($arquivo_key) {
        $this->db->delete('arquivo', array('id' => $arquivo_key));
    }



    //funcao listagem 
    function lista_arquivo() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('arquivo');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

