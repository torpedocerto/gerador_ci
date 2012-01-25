
                    <div>
                        <h1>Atualizar: Perguntas <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/perguntas_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_perguntas_update' id='frm_perguntas_update' method='POST' action='<?php echo base_url()?>index.php/perguntas_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='pergunta_tipo'>Pergunta_tipo</label>
                            <input type='text' name='pergunta_tipo' id='pergunta_tipo' value='<?php echo($this->Perguntas_model->_pergunta_tipo); ?>'><br/>
                            
                            <label for='pergunta_enunciado'>Pergunta_enunciado</label>
                            <input type='text' name='pergunta_enunciado' id='pergunta_enunciado' value='<?php echo($this->Perguntas_model->_pergunta_enunciado); ?>'><br/>
                            
                            <label for='pergunta_alternativas'>Pergunta_alternativas</label>
                            <input type='text' name='pergunta_alternativas' id='pergunta_alternativas' value='<?php echo($this->Perguntas_model->_pergunta_alternativas); ?>'><br/>
                            
                            <label for='pergunta_quiz'>Pergunta_quiz</label>
                            <input type='text' name='pergunta_quiz' id='pergunta_quiz' value='<?php echo($this->Perguntas_model->_pergunta_quiz); ?>'><br/>
                            
                            <label for='pergunta_status'>Pergunta_status</label>
                            <input type='text' name='pergunta_status' id='pergunta_status' value='<?php echo($this->Perguntas_model->_pergunta_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
