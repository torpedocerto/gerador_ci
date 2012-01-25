
                    <div>
                        <h1>Atualizar: Configs <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/configs_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_configs_update' id='frm_configs_update' method='POST' action='<?php echo base_url()?>index.php/configs_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='config_name'>Config_name</label>
                            <input type='text' name='config_name' id='config_name' value='<?php echo($this->Configs_model->_config_name); ?>'><br/>
                            
                            <label for='config_value'>Config_value</label>
                            <input type='text' name='config_value' id='config_value' value='<?php echo($this->Configs_model->_config_value); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
