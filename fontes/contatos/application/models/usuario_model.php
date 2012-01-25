<?php

class Usuario_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_nome                           = "";
    var $_usuario                        = "";
    var $_senha                          = "";
    var $_email                          = "";
    var $_telefone                       = "";
    var $_celular                        = "";
    var $_endereco                       = "";
    var $_status                         = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_usuario() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'nome'                 => $this->_nome, 
                'usuario'              => $this->_usuario, 
                'senha'                => $this->_senha, 
                'email'                => $this->_email, 
                'telefone'             => $this->_telefone, 
                'celular'              => $this->_celular, 
                'endereco'             => $this->_endereco, 
                'status'               => $this->_status
        );
        $this->db->insert('usuario', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_usuario($usuario_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $usuario_key);
        $rec    =   $this->db->get('usuario');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_nome                 = $ret[0]['nome'];
            $this->_usuario              = $ret[0]['usuario'];
            $this->_senha                = $ret[0]['senha'];
            $this->_email                = $ret[0]['email'];
            $this->_telefone             = $ret[0]['telefone'];
            $this->_celular              = $ret[0]['celular'];
            $this->_endereco             = $ret[0]['endereco'];
            $this->_status               = $ret[0]['status'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_usuario($usuario_key) {
        $ret    = 0;
        $data   = array(
                'nome'                 => $this->_nome, 
                'usuario'              => $this->_usuario, 
                'senha'                => $this->_senha, 
                'email'                => $this->_email, 
                'telefone'             => $this->_telefone, 
                'celular'              => $this->_celular, 
                'endereco'             => $this->_endereco, 
                'status'               => $this->_status
        );
        $this->db->where('id', $usuario_key);
        $this->db->update('usuario', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_usuario($usuario_key) {
        $this->db->delete('usuario', array('id' => $usuario_key));
    }



    //funcao listagem 
    function lista_usuario() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('usuario');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

