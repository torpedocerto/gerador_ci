<?php

class Servidor_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_cli_id                         = "";
    var $_descricao                      = "";
    var $_url                            = "";
    var $_ip_interno                     = "";
    var $_ip_externo                     = "";
    var $_usuario_root                   = "";
    var $_senha_root                     = "";
    var $_sistema_operacional            = "";
    var $_obs                            = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_servidor() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'cli_id'               => $this->_cli_id, 
                'descricao'            => $this->_descricao, 
                'url'                  => $this->_url, 
                'ip_interno'           => $this->_ip_interno, 
                'ip_externo'           => $this->_ip_externo, 
                'usuario_root'         => $this->_usuario_root, 
                'senha_root'           => $this->_senha_root, 
                'sistema_operacional'  => $this->_sistema_operacional, 
                'obs'                  => $this->_obs, 
                'status'               => $this->_status
        );
        $this->db->insert('servidor', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_servidor($servidor_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $servidor_key);
        $rec    =   $this->db->get('servidor');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_cli_id               = $ret[0]['cli_id'];
            $this->_descricao            = $ret[0]['descricao'];
            $this->_url                  = $ret[0]['url'];
            $this->_ip_interno           = $ret[0]['ip_interno'];
            $this->_ip_externo           = $ret[0]['ip_externo'];
            $this->_usuario_root         = $ret[0]['usuario_root'];
            $this->_senha_root           = $ret[0]['senha_root'];
            $this->_sistema_operacional  = $ret[0]['sistema_operacional'];
            $this->_obs                  = $ret[0]['obs'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_servidor($servidor_key) {
        $ret    = 0;
        $data   = array(
                'cli_id'               => $this->_cli_id, 
                'descricao'            => $this->_descricao, 
                'url'                  => $this->_url, 
                'ip_interno'           => $this->_ip_interno, 
                'ip_externo'           => $this->_ip_externo, 
                'usuario_root'         => $this->_usuario_root, 
                'senha_root'           => $this->_senha_root, 
                'sistema_operacional'  => $this->_sistema_operacional, 
                'obs'                  => $this->_obs, 
                'status'               => $this->_status
        );
        $this->db->where('id', $servidor_key);
        $this->db->update('servidor', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_servidor($servidor_key) {
        $this->db->delete('servidor', array('id' => $servidor_key));
    }



    //funcao listagem 
    function lista_servidor() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('servidor');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

