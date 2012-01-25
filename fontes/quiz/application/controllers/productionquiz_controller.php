<?php
                class Productionquiz_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Productionquiz_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Productionquiz_model->lista_productionquiz();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'productionquiz_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Productionquiz_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Productionquiz_model->_quiz_id              = $this->input->post('quiz_id');
                             $this->Productionquiz_model->_quiz                 = $this->input->post('quiz');
                             $this->Productionquiz_model->_quiz_status          = $this->input->post('quiz_status');
                             $this->Productionquiz_model->_quiz_pergunta        = $this->input->post('quiz_pergunta');

                            $this->Productionquiz_model->create_productionquiz();
                            redirect('productionquiz_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'productionquiz_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Productionquiz_model');
                            
                        $this->Productionquiz_model->delete_productionquiz($key_id);
                            
                        redirect('productionquiz_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Productionquiz_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Productionquiz_model->_quiz                 = $this->input->post('quiz');
                            $this->Productionquiz_model->_quiz_status          = $this->input->post('quiz_status');
                            $this->Productionquiz_model->_quiz_pergunta        = $this->input->post('quiz_pergunta');

                            $this->Productionquiz_model->update_productionquiz($key_id);
                            redirect('productionquiz_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Productionquiz_model->read_productionquiz($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'productionquiz_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
