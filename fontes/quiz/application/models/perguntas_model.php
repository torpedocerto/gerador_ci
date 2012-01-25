<?php

class Perguntas_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_pergunta_id                    = "";
    var $_pergunta_tipo                  = "";
    var $_pergunta_enunciado             = "";
    var $_pergunta_alternativas          = "";
    var $_pergunta_quiz                  = "";
    var $_pergunta_status                = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_perguntas() {
        $ret    = 0;
        $data   = array(
                'pergunta_id'          => $this->_pergunta_id, 
                'pergunta_tipo'        => $this->_pergunta_tipo, 
                'pergunta_enunciado'   => $this->_pergunta_enunciado, 
                'pergunta_alternativas'  => $this->_pergunta_alternativas, 
                'pergunta_quiz'        => $this->_pergunta_quiz, 
                'pergunta_status'      => $this->_pergunta_status
        );
        $this->db->insert('perguntas', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_perguntas($perguntas_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('pergunta_id', $perguntas_key);
        $rec    =   $this->db->get('perguntas');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_pergunta_id          = $ret[0]['pergunta_id'];
            $this->_pergunta_tipo        = $ret[0]['pergunta_tipo'];
            $this->_pergunta_enunciado   = $ret[0]['pergunta_enunciado'];
            $this->_pergunta_alternativas = $ret[0]['pergunta_alternativas'];
            $this->_pergunta_quiz        = $ret[0]['pergunta_quiz'];
            $this->_pergunta_status      = $ret[0]['pergunta_status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_perguntas($perguntas_key) {
        $ret    = 0;
        $data   = array(
                'pergunta_tipo'        => $this->_pergunta_tipo, 
                'pergunta_enunciado'   => $this->_pergunta_enunciado, 
                'pergunta_alternativas'  => $this->_pergunta_alternativas, 
                'pergunta_quiz'        => $this->_pergunta_quiz, 
                'pergunta_status'      => $this->_pergunta_status
        );
        $this->db->where('pergunta_id', $perguntas_key);
        $this->db->update('perguntas', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_perguntas($perguntas_key) {
        $this->db->delete('perguntas', array('pergunta_id' => $perguntas_key));
    }



    //funcao listagem 
    function lista_perguntas() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('perguntas');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

