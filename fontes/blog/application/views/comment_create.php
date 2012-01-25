
                    <div>
                        <h1>Novo: Comment</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/comment_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_comment_create' id='frm_comment_create' method='POST' action='<?php echo base_url()?>index.php/comment_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='post_id'>Post_id</label>
                            <input type='text' name='post_id' id='post_id'><br/>
                            
                            <label for='pseudo'>Pseudo</label>
                            <input type='text' name='pseudo' id='pseudo'><br/>
                            
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email'><br/>
                            
                            <label for='comment'>Comment</label>
                            <input type='text' name='comment' id='comment'><br/>
                            
                            <label for='created_at'>Created_at</label>
                            <input type='text' name='created_at' id='created_at'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
