
                    <div>
                        <h1>Novo: Servidor</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/servidor_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_servidor_create' id='frm_servidor_create' method='POST' action='<?php echo base_url()?>index.php/servidor_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='cli_id'>Cli_id</label>
                            <input type='text' name='cli_id' id='cli_id'><br/>
                            
                            <label for='descricao'>Descricao</label>
                            <input type='text' name='descricao' id='descricao'><br/>
                            
                            <label for='url'>Url</label>
                            <input type='text' name='url' id='url'><br/>
                            
                            <label for='ip_interno'>Ip_interno</label>
                            <input type='text' name='ip_interno' id='ip_interno'><br/>
                            
                            <label for='ip_externo'>Ip_externo</label>
                            <input type='text' name='ip_externo' id='ip_externo'><br/>
                            
                            <label for='usuario_root'>Usuario_root</label>
                            <input type='text' name='usuario_root' id='usuario_root'><br/>
                            
                            <label for='senha_root'>Senha_root</label>
                            <input type='text' name='senha_root' id='senha_root'><br/>
                            
                            <label for='sistema_operacional'>Sistema_operacional</label>
                            <input type='text' name='sistema_operacional' id='sistema_operacional'><br/>
                            
                            <label for='obs'>Obs</label>
                            <input type='text' name='obs' id='obs'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
