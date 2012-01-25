<?php
                class Alternativas_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Alternativas_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Alternativas_model->lista_alternativas();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'alternativas_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Alternativas_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Alternativas_model->_alternativa_id       = $this->input->post('alternativa_id');
                             $this->Alternativas_model->_alternativa_texto    = $this->input->post('alternativa_texto');
                             $this->Alternativas_model->_alternativa_tipo     = $this->input->post('alternativa_tipo');
                             $this->Alternativas_model->_alternativa_subitems = $this->input->post('alternativa_subitems');

                            $this->Alternativas_model->create_alternativas();
                            redirect('alternativas_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'alternativas_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Alternativas_model');
                            
                        $this->Alternativas_model->delete_alternativas($key_id);
                            
                        redirect('alternativas_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Alternativas_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Alternativas_model->_alternativa_texto    = $this->input->post('alternativa_texto');
                            $this->Alternativas_model->_alternativa_tipo     = $this->input->post('alternativa_tipo');
                            $this->Alternativas_model->_alternativa_subitems = $this->input->post('alternativa_subitems');

                            $this->Alternativas_model->update_alternativas($key_id);
                            redirect('alternativas_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Alternativas_model->read_alternativas($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'alternativas_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
