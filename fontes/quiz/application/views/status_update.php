
                    <div>
                        <h1>Atualizar: Status <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/status_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_status_update' id='frm_status_update' method='POST' action='<?php echo base_url()?>index.php/status_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='status_nome'>Status_nome</label>
                            <input type='text' name='status_nome' id='status_nome' value='<?php echo($this->Status_model->_status_nome); ?>'><br/>
                            
                            <label for='status_status'>Status_status</label>
                            <input type='text' name='status_status' id='status_status' value='<?php echo($this->Status_model->_status_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
