<?php
                class Status_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Status_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Status_model->lista_status();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'status_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Status_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Status_model->_status_id            = $this->input->post('status_id');
                             $this->Status_model->_status_nome          = $this->input->post('status_nome');
                             $this->Status_model->_status_status        = $this->input->post('status_status');

                            $this->Status_model->create_status();
                            redirect('status_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'status_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Status_model');
                            
                        $this->Status_model->delete_status($key_id);
                            
                        redirect('status_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Status_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Status_model->_status_nome          = $this->input->post('status_nome');
                            $this->Status_model->_status_status        = $this->input->post('status_status');

                            $this->Status_model->update_status($key_id);
                            redirect('status_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Status_model->read_status($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'status_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
