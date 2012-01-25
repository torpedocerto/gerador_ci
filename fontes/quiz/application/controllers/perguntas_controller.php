<?php
                class Perguntas_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Perguntas_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Perguntas_model->lista_perguntas();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'perguntas_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Perguntas_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Perguntas_model->_pergunta_id          = $this->input->post('pergunta_id');
                             $this->Perguntas_model->_pergunta_tipo        = $this->input->post('pergunta_tipo');
                             $this->Perguntas_model->_pergunta_enunciado   = $this->input->post('pergunta_enunciado');
                             $this->Perguntas_model->_pergunta_alternativas = $this->input->post('pergunta_alternativas');
                             $this->Perguntas_model->_pergunta_quiz        = $this->input->post('pergunta_quiz');
                             $this->Perguntas_model->_pergunta_status      = $this->input->post('pergunta_status');

                            $this->Perguntas_model->create_perguntas();
                            redirect('perguntas_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'perguntas_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Perguntas_model');
                            
                        $this->Perguntas_model->delete_perguntas($key_id);
                            
                        redirect('perguntas_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Perguntas_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Perguntas_model->_pergunta_tipo        = $this->input->post('pergunta_tipo');
                            $this->Perguntas_model->_pergunta_enunciado   = $this->input->post('pergunta_enunciado');
                            $this->Perguntas_model->_pergunta_alternativas = $this->input->post('pergunta_alternativas');
                            $this->Perguntas_model->_pergunta_quiz        = $this->input->post('pergunta_quiz');
                            $this->Perguntas_model->_pergunta_status      = $this->input->post('pergunta_status');

                            $this->Perguntas_model->update_perguntas($key_id);
                            redirect('perguntas_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Perguntas_model->read_perguntas($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'perguntas_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
