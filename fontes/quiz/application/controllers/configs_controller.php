<?php
                class Configs_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Configs_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Configs_model->lista_configs();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'configs_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Configs_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Configs_model->_config_id            = $this->input->post('config_id');
                             $this->Configs_model->_config_name          = $this->input->post('config_name');
                             $this->Configs_model->_config_value         = $this->input->post('config_value');

                            $this->Configs_model->create_configs();
                            redirect('configs_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'configs_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Configs_model');
                            
                        $this->Configs_model->delete_configs($key_id);
                            
                        redirect('configs_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Configs_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Configs_model->_config_name          = $this->input->post('config_name');
                            $this->Configs_model->_config_value         = $this->input->post('config_value');

                            $this->Configs_model->update_configs($key_id);
                            redirect('configs_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Configs_model->read_configs($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'configs_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
