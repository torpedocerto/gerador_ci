
                    <div>
                        <h1>Novo: Configs</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/configs_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_configs_create' id='frm_configs_create' method='POST' action='<?php echo base_url()?>index.php/configs_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='config_name'>Config_name</label>
                            <input type='text' name='config_name' id='config_name'><br/>
                            
                            <label for='config_value'>Config_value</label>
                            <input type='text' name='config_value' id='config_value'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
