
                    <div>
                        <h1>Listagem: Alternativas</h1>
                        <input type="button" class="button" value="Menu" onclick="location.href='<?php echo base_url()?>'" />
                        <input type="button" class="button" value="Novo" onclick="location.href='<?php echo base_url()?>index.php/alternativas_controller/create'" />
                    </div>
                    <br/>
                    <div>
                        <?php if(empty($lista)) : ?>
                            <div class="ui-widget">
                                <div style="margin-top: 20px; padding: 0 .7em;" class="ui-state-highlight ui-corner-all"> 
                                    <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-info"></span>
                                        <strong>Alerta:</strong> Não existem dados cadastrados. Clique em "novo" para inserir.</p>
                                </div>
                            </div>    
                        <?php else : ?>
                            <table border="1" cellspacing="0" cellpadding="5">
                                <tr>
                                    <?php foreach($lista[0] as $key => $value) : ?>
                                        <td><?php echo $key; ?></td>
                                    <?php endforeach ?>
                                    <td></td>
                                </tr>
                                <?php for($i=0; $i<sizeof($lista); $i++) : ?>
                                    <tr>
                                        <?php foreach($lista[$i] as $key => $value) : ?>
                                            <td><?php echo $value; ?></td>
                                        <?php endforeach ?>
                                            <td>
                                                <input type="button" class="button" value="Editar" onclick="location.href='<?php echo base_url()?>index.php/alternativas_controller/update/<?php echo $lista[$i]['alternativa_id']; ?>'" />    
                                                <input type="button" class="button" value="Apagar" onclick="location.href='<?php echo base_url()?>index.php/alternativas_controller/delete/<?php echo $lista[$i]['alternativa_id']; ?>'" />
                                            </td>    
                                    </tr>
                                <?php endfor ?>
                            </table>
                        <?php endif ?>
                    </div>                    
                    
