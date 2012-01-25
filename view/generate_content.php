        <!-- Candy comes in a wrapper -->
        <div id="wrapperWit">
            <!-- Hard candy outer shell -->
            <!-- Gooey center -->
            <div id="gooey">

                <div id="content">
                    <?php if (!isset($_POST['tables_list'])) : ?>
                        <br/>
                        <div name="error_table" id="error_table" style="display: block; width: 600px">
                            <div class="ui-widget">
                                <div style="padding: 0 .7em;" class="ui-state-error ui-corner-all"> 
                                    <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span> 
                                    <strong>Atencao:</strong> Nenhuma tabela foi selecionada para gerar o codigo. <br/>Clique em Configuracoes para conectar-se ao banco de dados e selecionar as tabelas desejadas.</p>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="ui-widget">
                            <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all"> 
                                <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                                    <strong>Projeto Gerado!</strong> <br/>Clique <a href="../fontes/<?=$gerador;?>" target="_blank">aqui</a> para visualizar ou <a href="../fontes/<?=$gerador;?>.tgz">aqui</a> para baixar</p>
                            </div>
                        </div>                        
                        <?php endif ?>
                    <div class="clear"></div>
                </div>

            </div>

        </div>
