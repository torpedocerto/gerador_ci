<?php

                class Index_controller extends CI_Controller {
                

                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                       //seta no main_content (templates) qual será a view a ser carregada
                       $data['main_content']     = 'index_lista';

                       //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                       $this->load->view('includes/template', $data);

                    } //fim index

                } //fim class
