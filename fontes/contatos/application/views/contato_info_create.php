
                    <div>
                        <h1>Novo: Contato_info</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/contato_info_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_contato_info_create' id='frm_contato_info_create' method='POST' action='<?php echo base_url()?>index.php/contato_info_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='con_id'>Con_id</label>
                            <input type='text' name='con_id' id='con_id'><br/>
                            
                            <label for='campo'>Campo</label>
                            <input type='text' name='campo' id='campo'><br/>
                            
                            <label for='tipo'>Tipo</label>
                            <input type='text' name='tipo' id='tipo'><br/>
                            
                            <label for='obs'>Obs</label>
                            <input type='text' name='obs' id='obs'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
