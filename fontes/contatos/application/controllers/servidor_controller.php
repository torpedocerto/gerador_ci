<?php
                class Servidor_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Servidor_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Servidor_model->lista_servidor();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'servidor_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Servidor_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Servidor_model->_id                   = $this->input->post('id');
                             $this->Servidor_model->_cli_id               = $this->input->post('cli_id');
                             $this->Servidor_model->_descricao            = $this->input->post('descricao');
                             $this->Servidor_model->_url                  = $this->input->post('url');
                             $this->Servidor_model->_ip_interno           = $this->input->post('ip_interno');
                             $this->Servidor_model->_ip_externo           = $this->input->post('ip_externo');
                             $this->Servidor_model->_usuario_root         = $this->input->post('usuario_root');
                             $this->Servidor_model->_senha_root           = $this->input->post('senha_root');
                             $this->Servidor_model->_sistema_operacional  = $this->input->post('sistema_operacional');
                             $this->Servidor_model->_obs                  = $this->input->post('obs');
                             $this->Servidor_model->_status               = $this->input->post('status');

                            $this->Servidor_model->create_servidor();
                            redirect('servidor_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'servidor_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Servidor_model');
                            
                        $this->Servidor_model->delete_servidor($key_id);
                            
                        redirect('servidor_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Servidor_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Servidor_model->_cli_id               = $this->input->post('cli_id');
                            $this->Servidor_model->_descricao            = $this->input->post('descricao');
                            $this->Servidor_model->_url                  = $this->input->post('url');
                            $this->Servidor_model->_ip_interno           = $this->input->post('ip_interno');
                            $this->Servidor_model->_ip_externo           = $this->input->post('ip_externo');
                            $this->Servidor_model->_usuario_root         = $this->input->post('usuario_root');
                            $this->Servidor_model->_senha_root           = $this->input->post('senha_root');
                            $this->Servidor_model->_sistema_operacional  = $this->input->post('sistema_operacional');
                            $this->Servidor_model->_obs                  = $this->input->post('obs');
                            $this->Servidor_model->_status               = $this->input->post('status');

                            $this->Servidor_model->update_servidor($key_id);
                            redirect('servidor_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Servidor_model->read_servidor($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'servidor_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
