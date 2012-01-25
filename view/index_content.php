        <!-- Candy comes in a wrapper -->
        <div id="wrapperWit">
            <!-- Hard candy outer shell -->
            <!-- Gooey center -->
            <div id="gooey">

                <div id="content">
                    <h3>Bem-vindo ao CodeIgniter Generator!</h3>
                    <p>Esta ferramenta lhe ajudara a criar o scafolding do seu projeto, automatizando assim as principais funcoes de cada objeto no seu banco de dados.</p>				

                    <h4>Como proceder para gerar um codigo em CodeIgniter?</h4>

                    <ul id="column1">
                        <li>Selecione a conexao com o banco de dados</li>
                        <li>Escolha uma tabela ou crie uma nova</li>
                        <li>Defina o nome do projeto</li>
                        <li>Selecione o template da view</li>
                        <li>Gere o codigo e esta pronto!</li>
                    </ul>
                    <div class="clear"></div>
                </div>


                <div id="news">
                    <h3 style="color: #333333;">
                        <img width="48" height="48" alt="Archives" src="http://static.codeigniter.com/design/archive.png">
                        </img><span>Projetos Gerados</span>
                    <h3>


                    <?php if ($arquivos_gerados) : ?>
                        <?php foreach ($arquivos_gerados as $key => $value) : ?>
                            <h5><a href="../fontes/<?=$key?>" target="_blank"><?=$key?></a></h5>

                            <p><a href="../fontes/<?=$value?>">Baixar o projeto</p>
                        <?php endforeach ?>
                    <?php endif ?>    
                            
                <div class="clear"></div>
            </div>

        </div>
