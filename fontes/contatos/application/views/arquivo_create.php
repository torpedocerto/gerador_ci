
                    <div>
                        <h1>Novo: Arquivo</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/arquivo_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_arquivo_create' id='frm_arquivo_create' method='POST' action='<?php echo base_url()?>index.php/arquivo_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='cli_id'>Cli_id</label>
                            <input type='text' name='cli_id' id='cli_id'><br/>
                            
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome'><br/>
                            
                            <label for='caminho'>Caminho</label>
                            <input type='text' name='caminho' id='caminho'><br/>
                            
                            <label for='descricao'>Descricao</label>
                            <input type='text' name='descricao' id='descricao'><br/>
                            
                            <label for='tipo'>Tipo</label>
                            <input type='text' name='tipo' id='tipo'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
