
                    <div>
                        <h1>Atualizar: Usuario <br/> Codigo: <?php echo($key_id);?></h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/usuario_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_usuario_update' id='frm_usuario_update' method='POST' action='<?php echo base_url()?>index.php/usuario_controller/update/<?php echo($key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome' value='<?php echo($this->Usuario_model->_nome); ?>'><br/>
                            
                            <label for='usuario'>Usuario</label>
                            <input type='text' name='usuario' id='usuario' value='<?php echo($this->Usuario_model->_usuario); ?>'><br/>
                            
                            <label for='senha'>Senha</label>
                            <input type='text' name='senha' id='senha' value='<?php echo($this->Usuario_model->_senha); ?>'><br/>
                            
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email' value='<?php echo($this->Usuario_model->_email); ?>'><br/>
                            
                            <label for='telefone'>Telefone</label>
                            <input type='text' name='telefone' id='telefone' value='<?php echo($this->Usuario_model->_telefone); ?>'><br/>
                            
                            <label for='celular'>Celular</label>
                            <input type='text' name='celular' id='celular' value='<?php echo($this->Usuario_model->_celular); ?>'><br/>
                            
                            <label for='endereco'>Endereco</label>
                            <input type='text' name='endereco' id='endereco' value='<?php echo($this->Usuario_model->_endereco); ?>'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status' value='<?php echo($this->Usuario_model->_status); ?>'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
