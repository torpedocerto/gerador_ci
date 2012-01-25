<?php

class Resultados_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_resultado_id                   = "";
    var $_resultado_operador             = "";
    var $_resultado_contrato             = "";
    var $_resultado_cliente              = "";
    var $_resultado_negocio              = "";
    var $_resultado_uf                   = "";
    var $_resultado_nome                 = "";
    var $_resultado_perguntanr           = "";
    var $_resultado_pergunta             = "";
    var $_resultado_alternativa          = "";
    var $_pergunta_subalternativa        = "";
    var $_resultado_subalternativa       = "";
    var $_resultado_tempo                = "";
    var $_resultado_data_cad             = "";
    var $_resultado_subalternativa_item  = "";
    var $_resultado_subsubalternativaitem = "";
    var $_resultado_textos               = "";
    var $_resultado_status               = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_resultados() {
        $ret    = 0;
        $data   = array(
                'resultado_id'         => $this->_resultado_id, 
                'resultado_operador'   => $this->_resultado_operador, 
                'resultado_contrato'   => $this->_resultado_contrato, 
                'resultado_cliente'    => $this->_resultado_cliente, 
                'resultado_negocio'    => $this->_resultado_negocio, 
                'resultado_uf'         => $this->_resultado_uf, 
                'resultado_nome'       => $this->_resultado_nome, 
                'resultado_perguntanr'  => $this->_resultado_perguntanr, 
                'resultado_pergunta'   => $this->_resultado_pergunta, 
                'resultado_alternativa'  => $this->_resultado_alternativa, 
                'pergunta_subalternativa'  => $this->_pergunta_subalternativa, 
                'resultado_subalternativa'  => $this->_resultado_subalternativa, 
                'resultado_tempo'      => $this->_resultado_tempo, 
                'resultado_data_cad'   => $this->_resultado_data_cad, 
                'resultado_subalternativa_item'  => $this->_resultado_subalternativa_item, 
                'resultado_subsubalternativaitem'  => $this->_resultado_subsubalternativaitem, 
                'resultado_textos'     => $this->_resultado_textos, 
                'resultado_status'     => $this->_resultado_status
        );
        $this->db->insert('resultados', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_resultados($resultados_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('resultado_id', $resultados_key);
        $rec    =   $this->db->get('resultados');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_resultado_id         = $ret[0]['resultado_id'];
            $this->_resultado_operador   = $ret[0]['resultado_operador'];
            $this->_resultado_contrato   = $ret[0]['resultado_contrato'];
            $this->_resultado_cliente    = $ret[0]['resultado_cliente'];
            $this->_resultado_negocio    = $ret[0]['resultado_negocio'];
            $this->_resultado_uf         = $ret[0]['resultado_uf'];
            $this->_resultado_nome       = $ret[0]['resultado_nome'];
            $this->_resultado_perguntanr = $ret[0]['resultado_perguntanr'];
            $this->_resultado_pergunta   = $ret[0]['resultado_pergunta'];
            $this->_resultado_alternativa = $ret[0]['resultado_alternativa'];
            $this->_pergunta_subalternativa = $ret[0]['pergunta_subalternativa'];
            $this->_resultado_subalternativa = $ret[0]['resultado_subalternativa'];
            $this->_resultado_tempo      = $ret[0]['resultado_tempo'];
            $this->_resultado_data_cad   = $ret[0]['resultado_data_cad'];
            $this->_resultado_subalternativa_item = $ret[0]['resultado_subalternativa_item'];
            $this->_resultado_subsubalternativaitem = $ret[0]['resultado_subsubalternativaitem'];
            $this->_resultado_textos     = $ret[0]['resultado_textos'];
            $this->_resultado_status     = $ret[0]['resultado_status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_resultados($resultados_key) {
        $ret    = 0;
        $data   = array(
                'resultado_operador'   => $this->_resultado_operador, 
                'resultado_contrato'   => $this->_resultado_contrato, 
                'resultado_cliente'    => $this->_resultado_cliente, 
                'resultado_negocio'    => $this->_resultado_negocio, 
                'resultado_uf'         => $this->_resultado_uf, 
                'resultado_nome'       => $this->_resultado_nome, 
                'resultado_perguntanr'  => $this->_resultado_perguntanr, 
                'resultado_pergunta'   => $this->_resultado_pergunta, 
                'resultado_alternativa'  => $this->_resultado_alternativa, 
                'pergunta_subalternativa'  => $this->_pergunta_subalternativa, 
                'resultado_subalternativa'  => $this->_resultado_subalternativa, 
                'resultado_tempo'      => $this->_resultado_tempo, 
                'resultado_data_cad'   => $this->_resultado_data_cad, 
                'resultado_subalternativa_item'  => $this->_resultado_subalternativa_item, 
                'resultado_subsubalternativaitem'  => $this->_resultado_subsubalternativaitem, 
                'resultado_textos'     => $this->_resultado_textos, 
                'resultado_status'     => $this->_resultado_status
        );
        $this->db->where('resultado_id', $resultados_key);
        $this->db->update('resultados', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_resultados($resultados_key) {
        $this->db->delete('resultados', array('resultado_id' => $resultados_key));
    }



    //funcao listagem 
    function lista_resultados() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('resultados');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

