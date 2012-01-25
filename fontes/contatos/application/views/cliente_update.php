
                    <div>
                        <h1>Atualizar: Cliente <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/cliente_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_cliente_update' id='frm_cliente_update' method='POST' action='<?php echo base_url()?>index.php/cliente_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome' value='<?php echo($this->Cliente_model->_nome); ?>'><br/>
                            
                            <label for='cpfcnpj'>Cpfcnpj</label>
                            <input type='text' name='cpfcnpj' id='cpfcnpj' value='<?php echo($this->Cliente_model->_cpfcnpj); ?>'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status' value='<?php echo($this->Cliente_model->_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
