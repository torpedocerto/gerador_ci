<?php
                class Contato_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Contato_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Contato_model->lista_contato();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'contato_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Contato_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Contato_model->_id                   = $this->input->post('id');
                             $this->Contato_model->_cli_id               = $this->input->post('cli_id');
                             $this->Contato_model->_nome                 = $this->input->post('nome');
                             $this->Contato_model->_departamento         = $this->input->post('departamento');
                             $this->Contato_model->_status               = $this->input->post('status');

                            $this->Contato_model->create_contato();
                            redirect('contato_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'contato_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Contato_model');
                            
                        $this->Contato_model->delete_contato($key_id);
                            
                        redirect('contato_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Contato_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Contato_model->_cli_id               = $this->input->post('cli_id');
                            $this->Contato_model->_nome                 = $this->input->post('nome');
                            $this->Contato_model->_departamento         = $this->input->post('departamento');
                            $this->Contato_model->_status               = $this->input->post('status');

                            $this->Contato_model->update_contato($key_id);
                            redirect('contato_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Contato_model->read_contato($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'contato_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
