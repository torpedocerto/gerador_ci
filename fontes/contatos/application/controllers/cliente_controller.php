<?php
                class Cliente_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Cliente_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Cliente_model->lista_cliente();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'cliente_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Cliente_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Cliente_model->_id                   = $this->input->post('id');
                             $this->Cliente_model->_nome                 = $this->input->post('nome');
                             $this->Cliente_model->_cpfcnpj              = $this->input->post('cpfcnpj');
                             $this->Cliente_model->_status               = $this->input->post('status');

                            $this->Cliente_model->create_cliente();
                            redirect('cliente_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'cliente_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Cliente_model');
                            
                        $this->Cliente_model->delete_cliente($key_id);
                            
                        redirect('cliente_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Cliente_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Cliente_model->_nome                 = $this->input->post('nome');
                            $this->Cliente_model->_cpfcnpj              = $this->input->post('cpfcnpj');
                            $this->Cliente_model->_status               = $this->input->post('status');

                            $this->Cliente_model->update_cliente($key_id);
                            redirect('cliente_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Cliente_model->read_cliente($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'cliente_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
