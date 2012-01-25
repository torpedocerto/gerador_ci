
                    <div>
                        <h1>Novo: Cliente</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/cliente_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_cliente_create' id='frm_cliente_create' method='POST' action='<?php echo base_url()?>index.php/cliente_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome'><br/>
                            
                            <label for='cpfcnpj'>Cpfcnpj</label>
                            <input type='text' name='cpfcnpj' id='cpfcnpj'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
