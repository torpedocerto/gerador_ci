
                    <div>
                        <h1>Atualizar: Comment <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/comment_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_comment_update' id='frm_comment_update' method='POST' action='<?php echo base_url()?>index.php/comment_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='post_id'>Post_id</label>
                            <input type='text' name='post_id' id='post_id' value='<?php echo($this->Comment_model->_post_id); ?>'><br/>
                            
                            <label for='pseudo'>Pseudo</label>
                            <input type='text' name='pseudo' id='pseudo' value='<?php echo($this->Comment_model->_pseudo); ?>'><br/>
                            
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email' value='<?php echo($this->Comment_model->_email); ?>'><br/>
                            
                            <label for='comment'>Comment</label>
                            <input type='text' name='comment' id='comment' value='<?php echo($this->Comment_model->_comment); ?>'><br/>
                            
                            <label for='created_at'>Created_at</label>
                            <input type='text' name='created_at' id='created_at' value='<?php echo($this->Comment_model->_created_at); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
