
                    <div>
                        <h1>Novo: Contato</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/contato_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_contato_create' id='frm_contato_create' method='POST' action='<?php echo base_url()?>index.php/contato_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='cli_id'>Cli_id</label>
                            <input type='text' name='cli_id' id='cli_id'><br/>
                            
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome'><br/>
                            
                            <label for='departamento'>Departamento</label>
                            <input type='text' name='departamento' id='departamento'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
