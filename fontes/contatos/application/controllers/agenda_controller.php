<?php
                class Agenda_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Agenda_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Agenda_model->lista_agenda();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'agenda_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Agenda_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Agenda_model->_id                   = $this->input->post('id');
                             $this->Agenda_model->_usu_id               = $this->input->post('usu_id');
                             $this->Agenda_model->_criado_em            = $this->input->post('criado_em');
                             $this->Agenda_model->_agenda_data          = $this->input->post('agenda_data');
                             $this->Agenda_model->_agenda_para          = $this->input->post('agenda_para');
                             $this->Agenda_model->_descricao            = $this->input->post('descricao');
                             $this->Agenda_model->_avisar_em            = $this->input->post('avisar_em');
                             $this->Agenda_model->_enviar_email         = $this->input->post('enviar_email');
                             $this->Agenda_model->_enviar_sms           = $this->input->post('enviar_sms');
                             $this->Agenda_model->_remarcado            = $this->input->post('remarcado');
                             $this->Agenda_model->_status               = $this->input->post('status');

                            $this->Agenda_model->create_agenda();
                            redirect('agenda_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'agenda_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Agenda_model');
                            
                        $this->Agenda_model->delete_agenda($key_id);
                            
                        redirect('agenda_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Agenda_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Agenda_model->_usu_id               = $this->input->post('usu_id');
                            $this->Agenda_model->_criado_em            = $this->input->post('criado_em');
                            $this->Agenda_model->_agenda_data          = $this->input->post('agenda_data');
                            $this->Agenda_model->_agenda_para          = $this->input->post('agenda_para');
                            $this->Agenda_model->_descricao            = $this->input->post('descricao');
                            $this->Agenda_model->_avisar_em            = $this->input->post('avisar_em');
                            $this->Agenda_model->_enviar_email         = $this->input->post('enviar_email');
                            $this->Agenda_model->_enviar_sms           = $this->input->post('enviar_sms');
                            $this->Agenda_model->_remarcado            = $this->input->post('remarcado');
                            $this->Agenda_model->_status               = $this->input->post('status');

                            $this->Agenda_model->update_agenda($key_id);
                            redirect('agenda_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Agenda_model->read_agenda($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'agenda_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
