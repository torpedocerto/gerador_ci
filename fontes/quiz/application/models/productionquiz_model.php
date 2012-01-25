<?php

class Productionquiz_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_quiz_id                        = "";
    var $_quiz                           = "";
    var $_quiz_status                    = "";
    var $_quiz_pergunta                  = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_productionquiz() {
        $ret    = 0;
        $data   = array(
                'quiz_id'              => $this->_quiz_id, 
                'quiz'                 => $this->_quiz, 
                'quiz_status'          => $this->_quiz_status, 
                'quiz_pergunta'        => $this->_quiz_pergunta
        );
        $this->db->insert('productionquiz', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_productionquiz($productionquiz_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('quiz_id', $productionquiz_key);
        $rec    =   $this->db->get('productionquiz');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_quiz_id              = $ret[0]['quiz_id'];
            $this->_quiz                 = $ret[0]['quiz'];
            $this->_quiz_status          = $ret[0]['quiz_status'];
            $this->_quiz_pergunta        = $ret[0]['quiz_pergunta'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_productionquiz($productionquiz_key) {
        $ret    = 0;
        $data   = array(
                'quiz'                 => $this->_quiz, 
                'quiz_status'          => $this->_quiz_status, 
                'quiz_pergunta'        => $this->_quiz_pergunta
        );
        $this->db->where('quiz_id', $productionquiz_key);
        $this->db->update('productionquiz', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_productionquiz($productionquiz_key) {
        $this->db->delete('productionquiz', array('quiz_id' => $productionquiz_key));
    }



    //funcao listagem 
    function lista_productionquiz() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('productionquiz');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

