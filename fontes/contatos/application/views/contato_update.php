
                    <div>
                        <h1>Atualizar: Contato <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/contato_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_contato_update' id='frm_contato_update' method='POST' action='<?php echo base_url()?>index.php/contato_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='cli_id'>Cli_id</label>
                            <input type='text' name='cli_id' id='cli_id' value='<?php echo($this->Contato_model->_cli_id); ?>'><br/>
                            
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome' value='<?php echo($this->Contato_model->_nome); ?>'><br/>
                            
                            <label for='departamento'>Departamento</label>
                            <input type='text' name='departamento' id='departamento' value='<?php echo($this->Contato_model->_departamento); ?>'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status' value='<?php echo($this->Contato_model->_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
