
                    <div>
                        <h1>Atualizar: Contato_info <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/contato_info_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_contato_info_update' id='frm_contato_info_update' method='POST' action='<?php echo base_url()?>index.php/contato_info_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='con_id'>Con_id</label>
                            <input type='text' name='con_id' id='con_id' value='<?php echo($this->Contato_info_model->_con_id); ?>'><br/>
                            
                            <label for='campo'>Campo</label>
                            <input type='text' name='campo' id='campo' value='<?php echo($this->Contato_info_model->_campo); ?>'><br/>
                            
                            <label for='tipo'>Tipo</label>
                            <input type='text' name='tipo' id='tipo' value='<?php echo($this->Contato_info_model->_tipo); ?>'><br/>
                            
                            <label for='obs'>Obs</label>
                            <input type='text' name='obs' id='obs' value='<?php echo($this->Contato_info_model->_obs); ?>'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status' value='<?php echo($this->Contato_info_model->_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
