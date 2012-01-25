<?php

class Contato_info_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_con_id                         = "";
    var $_campo                          = "";
    var $_tipo                           = "";
    var $_obs                            = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_contato_info() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'con_id'               => $this->_con_id, 
                'campo'                => $this->_campo, 
                'tipo'                 => $this->_tipo, 
                'obs'                  => $this->_obs, 
                'status'               => $this->_status
        );
        $this->db->insert('contato_info', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_contato_info($contato_info_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $contato_info_key);
        $rec    =   $this->db->get('contato_info');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_con_id               = $ret[0]['con_id'];
            $this->_campo                = $ret[0]['campo'];
            $this->_tipo                 = $ret[0]['tipo'];
            $this->_obs                  = $ret[0]['obs'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_contato_info($contato_info_key) {
        $ret    = 0;
        $data   = array(
                'con_id'               => $this->_con_id, 
                'campo'                => $this->_campo, 
                'tipo'                 => $this->_tipo, 
                'obs'                  => $this->_obs, 
                'status'               => $this->_status
        );
        $this->db->where('id', $contato_info_key);
        $this->db->update('contato_info', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_contato_info($contato_info_key) {
        $this->db->delete('contato_info', array('id' => $contato_info_key));
    }



    //funcao listagem 
    function lista_contato_info() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('contato_info');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

