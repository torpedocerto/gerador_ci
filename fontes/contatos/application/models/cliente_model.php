<?php

class Cliente_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_nome                           = "";
    var $_cpfcnpj                        = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_cliente() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'nome'                 => $this->_nome, 
                'cpfcnpj'              => $this->_cpfcnpj, 
                'status'               => $this->_status
        );
        $this->db->insert('cliente', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_cliente($cliente_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $cliente_key);
        $rec    =   $this->db->get('cliente');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_nome                 = $ret[0]['nome'];
            $this->_cpfcnpj              = $ret[0]['cpfcnpj'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_cliente($cliente_key) {
        $ret    = 0;
        $data   = array(
                'nome'                 => $this->_nome, 
                'cpfcnpj'              => $this->_cpfcnpj, 
                'status'               => $this->_status
        );
        $this->db->where('id', $cliente_key);
        $this->db->update('cliente', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_cliente($cliente_key) {
        $this->db->delete('cliente', array('id' => $cliente_key));
    }



    //funcao listagem 
    function lista_cliente() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('cliente');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

