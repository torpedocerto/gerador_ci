
                    <div>
                        <h1>Novo: Alternativas</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/alternativas_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_alternativas_create' id='frm_alternativas_create' method='POST' action='<?php echo base_url()?>index.php/alternativas_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='alternativa_texto'>Alternativa_texto</label>
                            <input type='text' name='alternativa_texto' id='alternativa_texto'><br/>
                            
                            <label for='alternativa_tipo'>Alternativa_tipo</label>
                            <input type='text' name='alternativa_tipo' id='alternativa_tipo'><br/>
                            
                            <label for='alternativa_subitems'>Alternativa_subitems</label>
                            <input type='text' name='alternativa_subitems' id='alternativa_subitems'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
