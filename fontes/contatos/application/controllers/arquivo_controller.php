<?php
                class Arquivo_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Arquivo_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Arquivo_model->lista_arquivo();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'arquivo_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Arquivo_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Arquivo_model->_id                   = $this->input->post('id');
                             $this->Arquivo_model->_cli_id               = $this->input->post('cli_id');
                             $this->Arquivo_model->_nome                 = $this->input->post('nome');
                             $this->Arquivo_model->_caminho              = $this->input->post('caminho');
                             $this->Arquivo_model->_descricao            = $this->input->post('descricao');
                             $this->Arquivo_model->_tipo                 = $this->input->post('tipo');
                             $this->Arquivo_model->_status               = $this->input->post('status');

                            $this->Arquivo_model->create_arquivo();
                            redirect('arquivo_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'arquivo_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Arquivo_model');
                            
                        $this->Arquivo_model->delete_arquivo($key_id);
                            
                        redirect('arquivo_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Arquivo_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Arquivo_model->_cli_id               = $this->input->post('cli_id');
                            $this->Arquivo_model->_nome                 = $this->input->post('nome');
                            $this->Arquivo_model->_caminho              = $this->input->post('caminho');
                            $this->Arquivo_model->_descricao            = $this->input->post('descricao');
                            $this->Arquivo_model->_tipo                 = $this->input->post('tipo');
                            $this->Arquivo_model->_status               = $this->input->post('status');

                            $this->Arquivo_model->update_arquivo($key_id);
                            redirect('arquivo_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Arquivo_model->read_arquivo($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'arquivo_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
