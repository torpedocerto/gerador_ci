
                    <div>
                        <h1>Atualizar: Resultados <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/resultados_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_resultados_update' id='frm_resultados_update' method='POST' action='<?php echo base_url()?>index.php/resultados_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='resultado_operador'>Resultado_operador</label>
                            <input type='text' name='resultado_operador' id='resultado_operador' value='<?php echo($this->Resultados_model->_resultado_operador); ?>'><br/>
                            
                            <label for='resultado_contrato'>Resultado_contrato</label>
                            <input type='text' name='resultado_contrato' id='resultado_contrato' value='<?php echo($this->Resultados_model->_resultado_contrato); ?>'><br/>
                            
                            <label for='resultado_cliente'>Resultado_cliente</label>
                            <input type='text' name='resultado_cliente' id='resultado_cliente' value='<?php echo($this->Resultados_model->_resultado_cliente); ?>'><br/>
                            
                            <label for='resultado_negocio'>Resultado_negocio</label>
                            <input type='text' name='resultado_negocio' id='resultado_negocio' value='<?php echo($this->Resultados_model->_resultado_negocio); ?>'><br/>
                            
                            <label for='resultado_uf'>Resultado_uf</label>
                            <input type='text' name='resultado_uf' id='resultado_uf' value='<?php echo($this->Resultados_model->_resultado_uf); ?>'><br/>
                            
                            <label for='resultado_nome'>Resultado_nome</label>
                            <input type='text' name='resultado_nome' id='resultado_nome' value='<?php echo($this->Resultados_model->_resultado_nome); ?>'><br/>
                            
                            <label for='resultado_perguntanr'>Resultado_perguntanr</label>
                            <input type='text' name='resultado_perguntanr' id='resultado_perguntanr' value='<?php echo($this->Resultados_model->_resultado_perguntanr); ?>'><br/>
                            
                            <label for='resultado_pergunta'>Resultado_pergunta</label>
                            <input type='text' name='resultado_pergunta' id='resultado_pergunta' value='<?php echo($this->Resultados_model->_resultado_pergunta); ?>'><br/>
                            
                            <label for='resultado_alternativa'>Resultado_alternativa</label>
                            <input type='text' name='resultado_alternativa' id='resultado_alternativa' value='<?php echo($this->Resultados_model->_resultado_alternativa); ?>'><br/>
                            
                            <label for='pergunta_subalternativa'>Pergunta_subalternativa</label>
                            <input type='text' name='pergunta_subalternativa' id='pergunta_subalternativa' value='<?php echo($this->Resultados_model->_pergunta_subalternativa); ?>'><br/>
                            
                            <label for='resultado_subalternativa'>Resultado_subalternativa</label>
                            <input type='text' name='resultado_subalternativa' id='resultado_subalternativa' value='<?php echo($this->Resultados_model->_resultado_subalternativa); ?>'><br/>
                            
                            <label for='resultado_tempo'>Resultado_tempo</label>
                            <input type='text' name='resultado_tempo' id='resultado_tempo' value='<?php echo($this->Resultados_model->_resultado_tempo); ?>'><br/>
                            
                            <label for='resultado_data_cad'>Resultado_data_cad</label>
                            <input type='text' name='resultado_data_cad' id='resultado_data_cad' value='<?php echo($this->Resultados_model->_resultado_data_cad); ?>'><br/>
                            
                            <label for='resultado_subalternativa_item'>Resultado_subalternativa_item</label>
                            <input type='text' name='resultado_subalternativa_item' id='resultado_subalternativa_item' value='<?php echo($this->Resultados_model->_resultado_subalternativa_item); ?>'><br/>
                            
                            <label for='resultado_subsubalternativaitem'>Resultado_subsubalternativaitem</label>
                            <input type='text' name='resultado_subsubalternativaitem' id='resultado_subsubalternativaitem' value='<?php echo($this->Resultados_model->_resultado_subsubalternativaitem); ?>'><br/>
                            
                            <label for='resultado_textos'>Resultado_textos</label>
                            <input type='text' name='resultado_textos' id='resultado_textos' value='<?php echo($this->Resultados_model->_resultado_textos); ?>'><br/>
                            
                            <label for='resultado_status'>Resultado_status</label>
                            <input type='text' name='resultado_status' id='resultado_status' value='<?php echo($this->Resultados_model->_resultado_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
