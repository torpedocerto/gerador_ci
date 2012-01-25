<?php

class Alternativas_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_alternativa_id                 = "";
    var $_alternativa_texto              = "";
    var $_alternativa_tipo               = "";
    var $_alternativa_subitems           = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_alternativas() {
        $ret    = 0;
        $data   = array(
                'alternativa_id'       => $this->_alternativa_id, 
                'alternativa_texto'    => $this->_alternativa_texto, 
                'alternativa_tipo'     => $this->_alternativa_tipo, 
                'alternativa_subitems'  => $this->_alternativa_subitems
        );
        $this->db->insert('alternativas', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_alternativas($alternativas_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('alternativa_id', $alternativas_key);
        $rec    =   $this->db->get('alternativas');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_alternativa_id       = $ret[0]['alternativa_id'];
            $this->_alternativa_texto    = $ret[0]['alternativa_texto'];
            $this->_alternativa_tipo     = $ret[0]['alternativa_tipo'];
            $this->_alternativa_subitems = $ret[0]['alternativa_subitems'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_alternativas($alternativas_key) {
        $ret    = 0;
        $data   = array(
                'alternativa_texto'    => $this->_alternativa_texto, 
                'alternativa_tipo'     => $this->_alternativa_tipo, 
                'alternativa_subitems'  => $this->_alternativa_subitems
        );
        $this->db->where('alternativa_id', $alternativas_key);
        $this->db->update('alternativas', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_alternativas($alternativas_key) {
        $this->db->delete('alternativas', array('alternativa_id' => $alternativas_key));
    }



    //funcao listagem 
    function lista_alternativas() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('alternativas');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

