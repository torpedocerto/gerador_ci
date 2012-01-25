
                    <div>
                        <h1>Novo: Agenda</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/agenda_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_agenda_create' id='frm_agenda_create' method='POST' action='<?php echo base_url()?>index.php/agenda_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='usu_id'>Usu_id</label>
                            <input type='text' name='usu_id' id='usu_id'><br/>
                            
                            <label for='criado_em'>Criado_em</label>
                            <input type='text' name='criado_em' id='criado_em'><br/>
                            
                            <label for='agenda_data'>Agenda_data</label>
                            <input type='text' name='agenda_data' id='agenda_data'><br/>
                            
                            <label for='agenda_para'>Agenda_para</label>
                            <input type='text' name='agenda_para' id='agenda_para'><br/>
                            
                            <label for='descricao'>Descricao</label>
                            <input type='text' name='descricao' id='descricao'><br/>
                            
                            <label for='avisar_em'>Avisar_em</label>
                            <input type='text' name='avisar_em' id='avisar_em'><br/>
                            
                            <label for='enviar_email'>Enviar_email</label>
                            <input type='text' name='enviar_email' id='enviar_email'><br/>
                            
                            <label for='enviar_sms'>Enviar_sms</label>
                            <input type='text' name='enviar_sms' id='enviar_sms'><br/>
                            
                            <label for='remarcado'>Remarcado</label>
                            <input type='text' name='remarcado' id='remarcado'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
