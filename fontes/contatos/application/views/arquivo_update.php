
                    <div>
                        <h1>Atualizar: Arquivo <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/arquivo_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_arquivo_update' id='frm_arquivo_update' method='POST' action='<?php echo base_url()?>index.php/arquivo_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='cli_id'>Cli_id</label>
                            <input type='text' name='cli_id' id='cli_id' value='<?php echo($this->Arquivo_model->_cli_id); ?>'><br/>
                            
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome' value='<?php echo($this->Arquivo_model->_nome); ?>'><br/>
                            
                            <label for='caminho'>Caminho</label>
                            <input type='text' name='caminho' id='caminho' value='<?php echo($this->Arquivo_model->_caminho); ?>'><br/>
                            
                            <label for='descricao'>Descricao</label>
                            <input type='text' name='descricao' id='descricao' value='<?php echo($this->Arquivo_model->_descricao); ?>'><br/>
                            
                            <label for='tipo'>Tipo</label>
                            <input type='text' name='tipo' id='tipo' value='<?php echo($this->Arquivo_model->_tipo); ?>'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status' value='<?php echo($this->Arquivo_model->_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
