<?php

class Comment_model extends CI_Model {

    //declaracao de variaveis para 'get' e 'set'
    var $_id                             = "";
    var $_post_id                        = "";
    var $_pseudo                         = "";
    var $_email                          = "";
    var $_comment                        = "";
    var $_created_at                     = "";


    //funcao construct
    function __construct() { parent::__construct(); }


    //funcao create (insert)
    function create_comment() {
        $ret    = 0;
        $data   = array(
                'id'                   => $this->_id, 
                'post_id'              => $this->_post_id, 
                'pseudo'               => $this->_pseudo, 
                'email'                => $this->_email, 
                'comment'              => $this->_comment, 
                'created_at'           => $this->_created_at
        );
        $this->db->insert('comment', $data);
        $ret    = $this->db->insert_id();
        return $ret;
    }



    //funcao read (select)
    function read_comment($comment_key) {
        $rec    = 0;
        $ret    = array();
        $this->db->select('*');
        $this->db->where('id', $comment_key);
        $rec    =   $this->db->get('comment');
        if ($rec->num_rows == 1) { 
            $ret  = $rec->result_array();
            $this->_id                   = $ret[0]['id'];
            $this->_post_id              = $ret[0]['post_id'];
            $this->_pseudo               = $ret[0]['pseudo'];
            $this->_email                = $ret[0]['email'];
            $this->_comment              = $ret[0]['comment'];
            $this->_created_at           = $ret[0]['created_at'];
            return TRUE;
        }
        else {
            return FALSE;
        }
    }



    //funcao update
    function update_comment($comment_key) {
        $ret    = 0;
        $data   = array(
                'post_id'              => $this->_post_id, 
                'pseudo'               => $this->_pseudo, 
                'email'                => $this->_email, 
                'comment'              => $this->_comment, 
                'created_at'           => $this->_created_at
        );
        $this->db->where('id', $comment_key);
        $this->db->update('comment', $data);
        $ret   = $this->db->affected_rows();
        return $ret;
    }



    //funcao delete 
    function delete_comment($comment_key) {
        $this->db->delete('comment', array('id' => $comment_key));
    }



    //funcao listagem 
    function lista_comment() {
        $ret    = 0;
        $ret    = array();
        $rec    = $this->db->get('comment');
        if ($rec->num_rows > 0) {
            $ret = $rec->result_array();
            return $ret;
        }
        else {
            return FALSE;
        }
    }
}

