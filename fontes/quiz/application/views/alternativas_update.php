
                    <div>
                        <h1>Atualizar: Alternativas <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/alternativas_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_alternativas_update' id='frm_alternativas_update' method='POST' action='<?php echo base_url()?>index.php/alternativas_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='alternativa_texto'>Alternativa_texto</label>
                            <input type='text' name='alternativa_texto' id='alternativa_texto' value='<?php echo($this->Alternativas_model->_alternativa_texto); ?>'><br/>
                            
                            <label for='alternativa_tipo'>Alternativa_tipo</label>
                            <input type='text' name='alternativa_tipo' id='alternativa_tipo' value='<?php echo($this->Alternativas_model->_alternativa_tipo); ?>'><br/>
                            
                            <label for='alternativa_subitems'>Alternativa_subitems</label>
                            <input type='text' name='alternativa_subitems' id='alternativa_subitems' value='<?php echo($this->Alternativas_model->_alternativa_subitems); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
