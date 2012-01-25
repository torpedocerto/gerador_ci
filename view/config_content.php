        <!-- Candy comes in a wrapper -->
        <div id="wrapperWit">
            <!-- Hard candy outer shell -->
            <!-- Gooey center -->
            <div id="gooey">

                <div id="content">
                    
                    <h3 onclick="$('#conexao_db').toggle('slow')">1 - Configure a conexao com o Banco de Dados (MySql)</h3>
                    <div style="display: block" name="conexao_db" id="conexao_db">
                        <div style="padding: 10px">
                            <div style="width: 200px; float: left">Server Host:</div>
                            <div style="width: 500px; float: left">
                                <input type="text" name="host" id="host" size="20" value="<?=@$_SESSION['conexao']['host']?>" style="border: 1px solid #CCC"/>
                            </div> 
                            <div style="clear: both"></div>

                            <br/>
                            <div style="width: 200px; float: left">Port:</div>
                            <div style="width: 500px; float: left">
                                <input type="text" name="port" id="port" size="5" value="<?=!isset($_SESSION['conexao']['port']) ? "3306" : $_SESSION['conexao']['port']?>" style="border: 1px solid #CCC"/>
                            </div> 
                            <div style="clear: both"></div>

                            <br/>
                            <div style="width: 200px; float: left">User Id:</div>
                            <div style="width: 500px; float: left">
                                <input type="text" name="userid" id="userid" size="20" value="<?=@$_SESSION['conexao']['userid']?>" style="border: 1px solid #CCC"/>
                            </div> 
                            <div style="clear: both"></div>

                            <br/>
                            <div style="width: 200px; float: left">Password:</div>
                            <div style="width: 500px; float: left">
                                <input type="password" name="passwd" id="passwd" size="20" value="<?=@$_SESSION['conexao']['passwd']?>" style="border: 1px solid #CCC"/>
                            </div> 
                            <div style="clear: both"></div>

                            <br/>
                            <div style="width: 200px; float: left">&nbsp;</div>
                            <div style="width: 100px; float: left">
                                <input type="button" value="Conectar" style="border: 1px solid #CCC" onclick="checar_conexao_db()"/>
                            </div> 
                            <div style="width: 100px; float: left">
                                <input type="reset" value="Cancelar" style="border: 1px solid #CCC"/>
                            </div> 
                            <div style="clear: both"></div>

                            <br/>
                            <div name="carregando_1" id="carregando_1" style="display: none">
                                <div style="width: 200px; float: left">&nbsp;</div>
                                <div style="width: 500px; float: left">
                                   <img src="./images/carregando.gif" alt="Carregando..." /> 
                                </div> 
                                <div style="clear: both"></div>
                            </div>    
                            
                        </div>
                    </div>
                    
                    
                    <div name="error_db" id="error_db" style="display: none; width: 300px">
                        <div class="ui-widget">
                            <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all"> 
                                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span> 
                                <strong>Erro:</strong> Nao foi possivel efetuar a conexao com o Banco de Dados. Confira as informacoes e tente novamente.</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div name="div_db" id="div_db" style="display: none">
                        <h3 onclick="$('#selecao_db').toggle('slow')">2 - Selecione um Banco de Dados</h3>
                        <div style="display: block" name="selecao_db" id="selecao_db">
                            <div style="padding: 10px">
                                <div style="width: 200px; float: left">Banco de Dados:</div>
                                <div style="width: 500px; float: left">
                                    <select name="select_db" id="select_db" onchange="mostrar_tabelas(this.value)">
                                        <option value="">Selecione</option>
                                    </select>
                                </div> 
                                <div style="clear: both"></div>
                                
                                <br/>
                                <div name="carregando_2" id="carregando_2" style="display: none">
                                    <div style="width: 200px; float: left">&nbsp;</div>
                                    <div style="width: 500px; float: left">
                                       <img src="./images/carregando.gif" alt="Carregando..." /> 
                                    </div> 
                                    <div style="clear: both"></div>
                                </div>    
                                                   
                            </div>
                        </div>        
                    </div>
                    

                    <div name="div_tables" id="div_tables" style="display:none">
                        <h3>3 - Selecione as tabelas</h3>
                        <style>
                            .column { width: 210px; float: left; padding-bottom: 100px; }
                            .portlet { margin: 0 1em 1em 0; }
                            .portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
                            .portlet-header .ui-icon { float: right; }
                            .portlet-content { padding: 0.4em; }
                            .ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
                            .ui-sortable-placeholder * { visibility: hidden; }
                        </style>


                        <div style="padding-left: 20px;" name="selecao_tabelas" id="selecao_tabelas">

                            <div class="column">

                                <div class="portlet">
                                    <div class="portlet-header">Feeds</div>
                                    <div class="portlet-content">
                                        <div><input type="checkbox" id="chk_tabela" name="chk_tabela" value="xx" checked/>Incluir tabela</div>
                                        <div style="padding: 5px">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
                                    </div>
                                </div>


                            </div> <!-- -->

                        </div><!-- sortable -->
                    </div>
                    
                <div class="clear"></div>

                <div name="error_table" id="error_table" style="display: none; width: 300px">
                    <div class="ui-widget">
                        <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all"> 
                            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span> 
                            <strong>Erro:</strong> Nenhuma tabela foi selecionada para gerar o codigo.</p>
                        </div>
                    </div>
                </div>
                    
                <div class="clear"></div>
                    
              
                <form method="POST" action="generate.php" name="frm_table" id="frm_table">
                    <input type="hidden" name="tables_list" id="tables_list" />
                </form>
                
                
                <div name="botao_gerar" id="botao_gerar" style="display: none">
                    <h3>4 - Gerar o codigo</h3>
                    <input type="button" value="Gerar Agora" style="border: 1px solid #CCC;" onclick="pegar_tabelas_selecionadas()" />
                </div> 
                
            </div>

        </div>




            