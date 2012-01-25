<?php
                class Comment_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Comment_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Comment_model->lista_comment();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'comment_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Comment_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Comment_model->_id                   = $this->input->post('id');
                             $this->Comment_model->_post_id              = $this->input->post('post_id');
                             $this->Comment_model->_pseudo               = $this->input->post('pseudo');
                             $this->Comment_model->_email                = $this->input->post('email');
                             $this->Comment_model->_comment              = $this->input->post('comment');
                             $this->Comment_model->_created_at           = $this->input->post('created_at');

                            $this->Comment_model->create_comment();
                            redirect('comment_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'comment_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Comment_model');
                            
                        $this->Comment_model->delete_comment($key_id);
                            
                        redirect('comment_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Comment_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Comment_model->_post_id              = $this->input->post('post_id');
                            $this->Comment_model->_pseudo               = $this->input->post('pseudo');
                            $this->Comment_model->_email                = $this->input->post('email');
                            $this->Comment_model->_comment              = $this->input->post('comment');
                            $this->Comment_model->_created_at           = $this->input->post('created_at');

                            $this->Comment_model->update_comment($key_id);
                            redirect('comment_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Comment_model->read_comment($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'comment_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
