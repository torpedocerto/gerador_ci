<?php

class Post_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_title                          = "";
    var $_description                    = "";
    var $_created_at                     = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_post() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'title'                => $this->_title, 
                'description'          => $this->_description, 
                'created_at'           => $this->_created_at
        );
        $this->db->insert('post', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_post($post_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $post_key);
        $rec    =   $this->db->get('post');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_title                = $ret[0]['title'];
            $this->_description          = $ret[0]['description'];
            $this->_created_at           = $ret[0]['created_at'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_post($post_key) {
        $ret    = 0;
        $data   = array(
                'title'                => $this->_title, 
                'description'          => $this->_description, 
                'created_at'           => $this->_created_at
        );
        $this->db->where('id', $post_key);
        $this->db->update('post', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_post($post_key) {
        $this->db->delete('post', array('id' => $post_key));
    }



    //funcao listagem 
    function lista_post() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('post');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

