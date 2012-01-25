
                    <div>
                        <h1>Atualizar: Post <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/post_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_post_update' id='frm_post_update' method='POST' action='<?php echo base_url()?>index.php/post_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='title'>Title</label>
                            <input type='text' name='title' id='title' value='<?php echo($this->Post_model->_title); ?>'><br/>
                            
                            <label for='description'>Description</label>
                            <input type='text' name='description' id='description' value='<?php echo($this->Post_model->_description); ?>'><br/>
                            
                            <label for='created_at'>Created_at</label>
                            <input type='text' name='created_at' id='created_at' value='<?php echo($this->Post_model->_created_at); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
