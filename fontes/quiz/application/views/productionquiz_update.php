
                    <div>
                        <h1>Atualizar: Productionquiz <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/productionquiz_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_productionquiz_update' id='frm_productionquiz_update' method='POST' action='<?php echo base_url()?>index.php/productionquiz_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='quiz'>Quiz</label>
                            <input type='text' name='quiz' id='quiz' value='<?php echo($this->Productionquiz_model->_quiz); ?>'><br/>
                            
                            <label for='quiz_status'>Quiz_status</label>
                            <input type='text' name='quiz_status' id='quiz_status' value='<?php echo($this->Productionquiz_model->_quiz_status); ?>'><br/>
                            
                            <label for='quiz_pergunta'>Quiz_pergunta</label>
                            <input type='text' name='quiz_pergunta' id='quiz_pergunta' value='<?php echo($this->Productionquiz_model->_quiz_pergunta); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
