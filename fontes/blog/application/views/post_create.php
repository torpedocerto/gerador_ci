
                    <div>
                        <h1>Novo: Post</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/post_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_post_create' id='frm_post_create' method='POST' action='<?php echo base_url()?>index.php/post_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='title'>Title</label>
                            <input type='text' name='title' id='title'><br/>
                            
                            <label for='description'>Description</label>
                            <input type='text' name='description' id='description'><br/>
                            
                            <label for='created_at'>Created_at</label>
                            <input type='text' name='created_at' id='created_at'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
