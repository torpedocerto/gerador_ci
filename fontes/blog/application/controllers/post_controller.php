<?php
                class Post_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Post_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Post_model->lista_post();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'post_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Post_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Post_model->_id                   = $this->input->post('id');
                             $this->Post_model->_title                = $this->input->post('title');
                             $this->Post_model->_description          = $this->input->post('description');
                             $this->Post_model->_created_at           = $this->input->post('created_at');

                            $this->Post_model->create_post();
                            redirect('post_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'post_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Post_model');
                            
                        $this->Post_model->delete_post($key_id);
                            
                        redirect('post_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Post_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Post_model->_title                = $this->input->post('title');
                            $this->Post_model->_description          = $this->input->post('description');
                            $this->Post_model->_created_at           = $this->input->post('created_at');

                            $this->Post_model->update_post($key_id);
                            redirect('post_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Post_model->read_post($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'post_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
