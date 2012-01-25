<?php
                class Contato_info_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Contato_info_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Contato_info_model->lista_contato_info();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'contato_info_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Contato_info_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Contato_info_model->_id                   = $this->input->post('id');
                             $this->Contato_info_model->_con_id               = $this->input->post('con_id');
                             $this->Contato_info_model->_campo                = $this->input->post('campo');
                             $this->Contato_info_model->_tipo                 = $this->input->post('tipo');
                             $this->Contato_info_model->_obs                  = $this->input->post('obs');
                             $this->Contato_info_model->_status               = $this->input->post('status');

                            $this->Contato_info_model->create_contato_info();
                            redirect('contato_info_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'contato_info_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Contato_info_model');
                            
                        $this->Contato_info_model->delete_contato_info($key_id);
                            
                        redirect('contato_info_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Contato_info_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Contato_info_model->_con_id               = $this->input->post('con_id');
                            $this->Contato_info_model->_campo                = $this->input->post('campo');
                            $this->Contato_info_model->_tipo                 = $this->input->post('tipo');
                            $this->Contato_info_model->_obs                  = $this->input->post('obs');
                            $this->Contato_info_model->_status               = $this->input->post('status');

                            $this->Contato_info_model->update_contato_info($key_id);
                            redirect('contato_info_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Contato_info_model->read_contato_info($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'contato_info_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
