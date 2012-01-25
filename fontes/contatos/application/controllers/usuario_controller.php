<?php
                class Usuario_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Usuario_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Usuario_model->lista_usuario();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'usuario_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Usuario_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Usuario_model->_id                   = $this->input->post('id');
                             $this->Usuario_model->_nome                 = $this->input->post('nome');
                             $this->Usuario_model->_usuario              = $this->input->post('usuario');
                             $this->Usuario_model->_senha                = $this->input->post('senha');
                             $this->Usuario_model->_email                = $this->input->post('email');
                             $this->Usuario_model->_telefone             = $this->input->post('telefone');
                             $this->Usuario_model->_celular              = $this->input->post('celular');
                             $this->Usuario_model->_endereco             = $this->input->post('endereco');
                             $this->Usuario_model->_status               = $this->input->post('status');

                            $this->Usuario_model->create_usuario();
                            redirect('usuario_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'usuario_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Usuario_model');
                            
                        $this->Usuario_model->delete_usuario($key_id);
                            
                        redirect('usuario_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Usuario_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Usuario_model->_nome                 = $this->input->post('nome');
                            $this->Usuario_model->_usuario              = $this->input->post('usuario');
                            $this->Usuario_model->_senha                = $this->input->post('senha');
                            $this->Usuario_model->_email                = $this->input->post('email');
                            $this->Usuario_model->_telefone             = $this->input->post('telefone');
                            $this->Usuario_model->_celular              = $this->input->post('celular');
                            $this->Usuario_model->_endereco             = $this->input->post('endereco');
                            $this->Usuario_model->_status               = $this->input->post('status');

                            $this->Usuario_model->update_usuario($key_id);
                            redirect('usuario_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Usuario_model->read_usuario($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'usuario_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
