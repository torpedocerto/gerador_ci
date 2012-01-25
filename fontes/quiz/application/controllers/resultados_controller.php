<?php
                class Resultados_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        $this->load->model('Resultados_model');
                            
                        //carregando os dados para listagem
                        $data['lista']   = $this->Resultados_model->lista_resultados();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        $data['main_content']     = 'resultados_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                        $this->load->view('includes/template', $data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        $this->load->model('Resultados_model');

                        $create = $this->input->post('create');
                        
                        if ($create == 'true') { 
                             $this->Resultados_model->_resultado_id         = $this->input->post('resultado_id');
                             $this->Resultados_model->_resultado_operador   = $this->input->post('resultado_operador');
                             $this->Resultados_model->_resultado_contrato   = $this->input->post('resultado_contrato');
                             $this->Resultados_model->_resultado_cliente    = $this->input->post('resultado_cliente');
                             $this->Resultados_model->_resultado_negocio    = $this->input->post('resultado_negocio');
                             $this->Resultados_model->_resultado_uf         = $this->input->post('resultado_uf');
                             $this->Resultados_model->_resultado_nome       = $this->input->post('resultado_nome');
                             $this->Resultados_model->_resultado_perguntanr = $this->input->post('resultado_perguntanr');
                             $this->Resultados_model->_resultado_pergunta   = $this->input->post('resultado_pergunta');
                             $this->Resultados_model->_resultado_alternativa = $this->input->post('resultado_alternativa');
                             $this->Resultados_model->_pergunta_subalternativa = $this->input->post('pergunta_subalternativa');
                             $this->Resultados_model->_resultado_subalternativa = $this->input->post('resultado_subalternativa');
                             $this->Resultados_model->_resultado_tempo      = $this->input->post('resultado_tempo');
                             $this->Resultados_model->_resultado_data_cad   = $this->input->post('resultado_data_cad');
                             $this->Resultados_model->_resultado_subalternativa_item = $this->input->post('resultado_subalternativa_item');
                             $this->Resultados_model->_resultado_subsubalternativaitem = $this->input->post('resultado_subsubalternativaitem');
                             $this->Resultados_model->_resultado_textos     = $this->input->post('resultado_textos');
                             $this->Resultados_model->_resultado_status     = $this->input->post('resultado_status');

                            $this->Resultados_model->create_resultados();
                            redirect('resultados_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'resultados_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        
                        }

                    } //fim create
                    

                   function delete($key_id) {
                        //carregando o model
                        $this->load->model('Resultados_model');
                            
                        $this->Resultados_model->delete_resultados($key_id);
                            
                        redirect('resultados_controller/index');
                   } //fim delete
                   

                   function update($key_id) {
                        //carregando o model
                        $this->load->model('Resultados_model');

                        $update = $this->input->post('update');
                        
                        if ($update == 'true') { 
                            $this->Resultados_model->_resultado_operador   = $this->input->post('resultado_operador');
                            $this->Resultados_model->_resultado_contrato   = $this->input->post('resultado_contrato');
                            $this->Resultados_model->_resultado_cliente    = $this->input->post('resultado_cliente');
                            $this->Resultados_model->_resultado_negocio    = $this->input->post('resultado_negocio');
                            $this->Resultados_model->_resultado_uf         = $this->input->post('resultado_uf');
                            $this->Resultados_model->_resultado_nome       = $this->input->post('resultado_nome');
                            $this->Resultados_model->_resultado_perguntanr = $this->input->post('resultado_perguntanr');
                            $this->Resultados_model->_resultado_pergunta   = $this->input->post('resultado_pergunta');
                            $this->Resultados_model->_resultado_alternativa = $this->input->post('resultado_alternativa');
                            $this->Resultados_model->_pergunta_subalternativa = $this->input->post('pergunta_subalternativa');
                            $this->Resultados_model->_resultado_subalternativa = $this->input->post('resultado_subalternativa');
                            $this->Resultados_model->_resultado_tempo      = $this->input->post('resultado_tempo');
                            $this->Resultados_model->_resultado_data_cad   = $this->input->post('resultado_data_cad');
                            $this->Resultados_model->_resultado_subalternativa_item = $this->input->post('resultado_subalternativa_item');
                            $this->Resultados_model->_resultado_subsubalternativaitem = $this->input->post('resultado_subsubalternativaitem');
                            $this->Resultados_model->_resultado_textos     = $this->input->post('resultado_textos');
                            $this->Resultados_model->_resultado_status     = $this->input->post('resultado_status');

                            $this->Resultados_model->update_resultados($key_id);
                            redirect('resultados_controller/index');
                        }
                        else {
                            $data['key_id']           = $key_id;
                            
                            $this->Resultados_model->read_resultados($key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            $data['main_content']     = 'resultados_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array $data com o main_content
                            $this->load->view('includes/template', $data);
                        }
                   } //fim update

                } //fim class
