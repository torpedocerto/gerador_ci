
                    <div>
                        <h1>Novo: Usuario</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Lista" onclick="location.href='<?php echo base_url()?>index.php/usuario_controller'" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_usuario_create' id='frm_usuario_create' method='POST' action='<?php echo base_url()?>index.php/usuario_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    
                            <label for='nome'>Nome</label>
                            <input type='text' name='nome' id='nome'><br/>
                            
                            <label for='usuario'>Usuario</label>
                            <input type='text' name='usuario' id='usuario'><br/>
                            
                            <label for='senha'>Senha</label>
                            <input type='text' name='senha' id='senha'><br/>
                            
                            <label for='email'>Email</label>
                            <input type='text' name='email' id='email'><br/>
                            
                            <label for='telefone'>Telefone</label>
                            <input type='text' name='telefone' id='telefone'><br/>
                            
                            <label for='celular'>Celular</label>
                            <input type='text' name='celular' id='celular'><br/>
                            
                            <label for='endereco'>Endereco</label>
                            <input type='text' name='endereco' id='endereco'><br/>
                            
                            <label for='status'>Status</label>
                            <input type='text' name='status' id='status'><br/>
                            
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    
