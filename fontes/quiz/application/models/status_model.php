<?php

class Status_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_status_id                      = "";
    var $_status_nome                    = "";
    var $_status_status                  = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_status() {
        $ret    = 0;
        $data   = array(
                'status_id'            => $this->_status_id, 
                'status_nome'          => $this->_status_nome, 
                'status_status'        => $this->_status_status
        );
        $this->db->insert('status', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_status($status_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('status_id', $status_key);
        $rec    =   $this->db->get('status');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_status_id            = $ret[0]['status_id'];
            $this->_status_nome          = $ret[0]['status_nome'];
            $this->_status_status        = $ret[0]['status_status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_status($status_key) {
        $ret    = 0;
        $data   = array(
                'status_nome'          => $this->_status_nome, 
                'status_status'        => $this->_status_status
        );
        $this->db->where('status_id', $status_key);
        $this->db->update('status', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_status($status_key) {
        $this->db->delete('status', array('status_id' => $status_key));
    }



    //funcao listagem 
    function lista_status() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('status');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

