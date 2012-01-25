<?php

class Configs_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_config_id                      = "";
    var $_config_name                    = "";
    var $_config_value                   = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_configs() {
        $ret    = 0;
        $data   = array(
                'config_id'            => $this->_config_id, 
                'config_name'          => $this->_config_name, 
                'config_value'         => $this->_config_value
        );
        $this->db->insert('configs', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_configs($configs_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('config_id', $configs_key);
        $rec    =   $this->db->get('configs');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_config_id            = $ret[0]['config_id'];
            $this->_config_name          = $ret[0]['config_name'];
            $this->_config_value         = $ret[0]['config_value'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_configs($configs_key) {
        $ret    = 0;
        $data   = array(
                'config_name'          => $this->_config_name, 
                'config_value'         => $this->_config_value
        );
        $this->db->where('config_id', $configs_key);
        $this->db->update('configs', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_configs($configs_key) {
        $this->db->delete('configs', array('config_id' => $configs_key));
    }



    //funcao listagem 
    function lista_configs() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('configs');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

