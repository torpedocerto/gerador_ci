<?php

class Agenda_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_usu_id                         = "";
    var $_criado_em                      = "";
    var $_agenda_data                    = "";
    var $_agenda_para                    = "";
    var $_descricao                      = "";
    var $_avisar_em                      = "";
    var $_enviar_email                   = "";
    var $_enviar_sms                     = "";
    var $_remarcado                      = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_agenda() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'usu_id'               => $this->_usu_id, 
                'criado_em'            => $this->_criado_em, 
                'agenda_data'          => $this->_agenda_data, 
                'agenda_para'          => $this->_agenda_para, 
                'descricao'            => $this->_descricao, 
                'avisar_em'            => $this->_avisar_em, 
                'enviar_email'         => $this->_enviar_email, 
                'enviar_sms'           => $this->_enviar_sms, 
                'remarcado'            => $this->_remarcado, 
                'status'               => $this->_status
        );
        $this->db->insert('agenda', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_agenda($agenda_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $agenda_key);
        $rec    =   $this->db->get('agenda');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_usu_id               = $ret[0]['usu_id'];
            $this->_criado_em            = $ret[0]['criado_em'];
            $this->_agenda_data          = $ret[0]['agenda_data'];
            $this->_agenda_para          = $ret[0]['agenda_para'];
            $this->_descricao            = $ret[0]['descricao'];
            $this->_avisar_em            = $ret[0]['avisar_em'];
            $this->_enviar_email         = $ret[0]['enviar_email'];
            $this->_enviar_sms           = $ret[0]['enviar_sms'];
            $this->_remarcado            = $ret[0]['remarcado'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_agenda($agenda_key) {
        $ret    = 0;
        $data   = array(
                'usu_id'               => $this->_usu_id, 
                'criado_em'            => $this->_criado_em, 
                'agenda_data'          => $this->_agenda_data, 
                'agenda_para'          => $this->_agenda_para, 
                'descricao'            => $this->_descricao, 
                'avisar_em'            => $this->_avisar_em, 
                'enviar_email'         => $this->_enviar_email, 
                'enviar_sms'           => $this->_enviar_sms, 
                'remarcado'            => $this->_remarcado, 
                'status'               => $this->_status
        );
        $this->db->where('id', $agenda_key);
        $this->db->update('agenda', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_agenda($agenda_key) {
        $this->db->delete('agenda', array('id' => $agenda_key));
    }



    //funcao listagem 
    function lista_agenda() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('agenda');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

