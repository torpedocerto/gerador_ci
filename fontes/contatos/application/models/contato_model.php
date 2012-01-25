<?php

class Contato_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_cli_id                         = "";
    var $_nome                           = "";
    var $_departamento                   = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_contato() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'cli_id'               => $this->_cli_id, 
                'nome'                 => $this->_nome, 
                'departamento'         => $this->_departamento, 
                'status'               => $this->_status
        );
        $this->db->insert('contato', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_contato($contato_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $contato_key);
        $rec    =   $this->db->get('contato');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_cli_id               = $ret[0]['cli_id'];
            $this->_nome                 = $ret[0]['nome'];
            $this->_departamento         = $ret[0]['departamento'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_contato($contato_key) {
        $ret    = 0;
        $data   = array(
                'cli_id'               => $this->_cli_id, 
                'nome'                 => $this->_nome, 
                'departamento'         => $this->_departamento, 
                'status'               => $this->_status
        );
        $this->db->where('id', $contato_key);
        $this->db->update('contato', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_contato($contato_key) {
        $this->db->delete('contato', array('id' => $contato_key));
    }



    //funcao listagem 
    function lista_contato() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('contato');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

