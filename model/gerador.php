<?php
include "settings.php";

class gerador extends settings {
    
 
    public function processar_geracao_codigo($tables_list) {
        $ret = false;
        if (trim($tables_list) != "") {
            $conn_db = self::checar_conexao_db($_SESSION['db']);
            if ($conn_db) {
                $lst = explode(",", $tables_list);
                $tbl = self::pegar_detalhes_tabelas($lst, $conn_db);
                if (!empty($tbl)) {
                    $diretorio  = "../ci";
                    $destino    = "../fontes/".$_SESSION['db'];
                    self::copiar_aplicacao($diretorio, $destino);
                    self::gerar_modelo_dados($tbl);
                    self::gerar_controle_index($tbl);
                    self::gerar_controle_dados($tbl);
                    self::gerar_view_index($tbl);
                    self::gerar_view_lista($tbl);
                    self::gerar_view_create($tbl);
                    self::gerar_view_update($tbl);
                    self::gerar_configuracao_database($_SESSION['db']);
                    self::compactar_instalacao($_SESSION['db']);
                }
                $ret = $_SESSION['db'];
            }
        }
        return $ret;
    }
    
    
    public function gerar_modelo_dados($dados_objetos) {
        $dir_name  = 'application/models';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            foreach ($dados_objetos as $objeto => $dados) {
                $fp = self::abrir_arquivo($objeto, $dir_name, 'model');
                self::gravar_linha($fp, "<?php\n");
                self::gravar_linha($fp, "class ".ucwords($objeto)."_model extends CI_Model {\n");

                self::gerar_variaveis($fp, $dados);
                
                self::gerar_model_crud($fp, $objeto, $dados);

                self::gravar_linha($fp, "}\n");
                self::fechar_arquivo($fp);
            }
        }
    }
    
    
    public function criar_diretorio($dir_name) {
        $diretorio = "../fontes/".$_SESSION['db']."/".$dir_name;
        
        if (!is_dir($diretorio)) {
            // cria o diretório com a permissão 0777
            if (!mkdir($diretorio, 0777, true)) {
                echo "Não foi possível criar o diretório.";
                return false;
            }
        }
        return true;
    }
    
    
    public function abrir_arquivo($objeto, $dir_name, $tipo) {
        $fp = fopen("../fontes/".$_SESSION['db']."/".$dir_name."/".strtolower($objeto)."_".$tipo.".php", "w+");
        return $fp;
    }
    
    
    public function gravar_linha($fp, $linha) {
        fwrite($fp, $linha."\n");
    }
    
    
    public function fechar_arquivo($fp) {
        fclose($fp);
    }
    
    
    public function gerar_variaveis($fp, $dados) {
        self::gravar_linha($fp, "    //declaracao de variaveis para 'get' e 'set'");
        for ($i=0; $i<sizeof($dados); $i++) {
            $variavel = str_pad($dados[$i]['Field'], 30, " ");
            self::gravar_linha($fp, '    var $_'.$variavel.' = "";'); 
        }
    }
    
    
    public function gerar_model_crud($fp, $objeto, $dados) {
        self::gravar_linha($fp, "\n");
        self::gravar_linha($fp, "    //funcao construct");
        self::gravar_linha($fp, "    function __construct() { parent::__construct(); }\n\n");
        
        self::gerar_model_create($fp, $objeto, $dados);
        self::gerar_model_read($fp, $objeto, $dados);
        self::gerar_model_update($fp, $objeto, $dados);
        self::gerar_model_delete($fp, $objeto, $dados);
        self::gerar_model_lista($fp, $objeto, $dados);
    }
    

    public function gerar_model_create($fp, $objeto, $dados) {
        self::gravar_linha($fp, "    //funcao create (insert)");
        self::gravar_linha($fp, '    function create_'.$objeto.'() {');
        self::gravar_linha($fp, '        $ret    = 0;');
        self::gravar_linha($fp, '        $data   = array(');
        for ($i = 0; $i < sizeof($dados); $i++) {
            $temp[$i] = ('                \''.str_pad($dados[$i]['Field'].'\'', 20, " ").'  => $this->_'.$dados[$i]['Field']);
        }
        $data = join(", \n", $temp);
        self::gravar_linha($fp, $data);
        self::gravar_linha($fp, '        );');
        self::gravar_linha($fp, '        $this->db->insert(\''.$objeto.'\', $data);');
        self::gravar_linha($fp, '        $ret    = $this->db->insert_id();');
        self::gravar_linha($fp, '        return $ret;');
        self::gravar_linha($fp, '    }');
        self::gravar_linha($fp, "\n\n");
    }
    

    public function gerar_model_read($fp, $objeto, $dados) {
        self::gravar_linha($fp, "    //funcao read (select)");
        self::gravar_linha($fp, '    function read_'.$objeto.'($'.$objeto.'_key) {');
        self::gravar_linha($fp, '        $rec    = 0;');
        self::gravar_linha($fp, '        $ret    = array();');
        self::gravar_linha($fp, '        $this->db->select(\'*\');');
        $pk = 'key';
        for ($i=0;$i<sizeof($dados);$i++) {
            if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                $pk = $dados[$i]['Field'];
            }
        }
        self::gravar_linha($fp, '        $this->db->where(\''.$pk.'\', $'.$objeto.'_key);');
        self::gravar_linha($fp, '        $rec    =   $this->db->get(\''.$objeto.'\');');
        self::gravar_linha($fp, '        if ($rec->num_rows == 1) { ');
        self::gravar_linha($fp, '            $ret  = $rec->result_array();');
        for ($i=0;$i<sizeof($dados);$i++) {
            self::gravar_linha($fp, '            $this->_'.str_pad($dados[$i]['Field'], 20, " ").' = $ret[0][\''.$dados[$i]['Field'].'\'];');
        }
        self::gravar_linha($fp, '            return TRUE;');
        self::gravar_linha($fp, '        }');
        self::gravar_linha($fp, '        else {');
        self::gravar_linha($fp, '            return FALSE;');
        self::gravar_linha($fp, '        }');
        self::gravar_linha($fp, '    }');
        self::gravar_linha($fp, "\n\n");
    }
    
    
    public function gerar_model_update($fp, $objeto, $dados) {
        $pk = 'key';
        for ($i=0;$i<sizeof($dados);$i++) {
            if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                $pk = $dados[$i]['Field'];
            }
        }
        self::gravar_linha($fp, "    //funcao update");
        self::gravar_linha($fp, '    function update_'.$objeto.'($'.$objeto.'_key) {');
        self::gravar_linha($fp, '        $ret    = 0;');
        self::gravar_linha($fp, '        $data   = array(');
        for ($i = 0; $i < sizeof($dados); $i++) {
            if ($pk != $dados[$i]['Field']) {
                $temp[$i] = ('                \''.str_pad($dados[$i]['Field'].'\'', 20, " ").'  => $this->_'.$dados[$i]['Field']);
            }
        }
        $data = join(", \n", $temp);
        self::gravar_linha($fp, $data);
        self::gravar_linha($fp, '        );');
        self::gravar_linha($fp, '        $this->db->where(\''.$pk.'\', $'.$objeto.'_key);');
        self::gravar_linha($fp, '        $this->db->update(\''.$objeto.'\', $data);');
        self::gravar_linha($fp, '        $ret   = $this->db->affected_rows();');
        self::gravar_linha($fp, '        return $ret;');
        self::gravar_linha($fp, '    }');
        self::gravar_linha($fp, "\n\n");
        
    }
    
    
    public function gerar_model_delete($fp, $objeto, $dados) {
        self::gravar_linha($fp, "    //funcao delete ");
        self::gravar_linha($fp, '    function delete_'.$objeto.'($'.$objeto.'_key) {');
        $pk = 'key';
        for ($i=0;$i<sizeof($dados);$i++) {
            if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                $pk = $dados[$i]['Field'];
            }
        }
        self::gravar_linha($fp, '        $this->db->delete(\''.$objeto.'\', array(\''.$pk.'\' => $'.$objeto.'_key));');
        self::gravar_linha($fp, '    }');
        self::gravar_linha($fp, "\n\n");
        
    }
    

    public function gerar_model_lista($fp, $objeto, $dados) {
        self::gravar_linha($fp, "    //funcao listagem ");
        self::gravar_linha($fp, '    function lista_'.$objeto.'() {');
        self::gravar_linha($fp, '        $ret    = 0;');
        self::gravar_linha($fp, '        $ret    = array();');
        self::gravar_linha($fp, '        $rec    = $this->db->get(\''.$objeto.'\');');
        self::gravar_linha($fp, '        if ($rec->num_rows > 0) {');
        self::gravar_linha($fp, '            $ret = $rec->result_array();');
        self::gravar_linha($fp, '            return $ret;');
        self::gravar_linha($fp, '        }');
        self::gravar_linha($fp, '        else {');
        self::gravar_linha($fp, '            return FALSE;');
        self::gravar_linha($fp, '        }');
        self::gravar_linha($fp, '    }');
    }

   
    public function gerar_controle_index($dados_objetos) {
        $dir_name  = 'application/controllers';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            $fp = self::abrir_arquivo('index', $dir_name, 'controller');
            $texto = "<?php

                class Index_controller extends CI_Controller {
                

                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                       //seta no main_content (templates) qual será a view a ser carregada
                       \$data['main_content']     = 'index_lista';

                       //carrega a view, na pasta view/includes/template.php e passa o array \$data com o main_content
                       \$this->load->view('includes/template', \$data);

                    } //fim index

                } //fim class";
            self::gravar_linha($fp, $texto);
            self::fechar_arquivo($fp);
        }
    }
    
    
    public function gerar_controle_dados($dados_objetos) {
        $dir_name  = 'application/controllers';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            foreach ($dados_objetos as $objeto => $dados) {
                $pk = 'key';
                for ($i=0;$i<sizeof($dados);$i++) {
                    if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                        $pk = $dados[$i]['Field'];
                    }
                }
                $fp     = self::abrir_arquivo($objeto, $dir_name, 'controller');
                $texto  = "<?php
                class ".ucfirst($objeto)."_controller extends CI_Controller {
                        
                    //funcao construct
                    function __construct() { parent::__construct(); }


                    function index() {
                        //carregando o model
                        \$this->load->model('".ucfirst($objeto)."_model');
                            
                        //carregando os dados para listagem
                        \$data['lista']   = \$this->".ucfirst($objeto)."_model->lista_".$objeto."();
                            
                        //seta no main_content (templates) qual será a view a ser carregada
                        \$data['main_content']     = '".$objeto."_lista';

                        //carrega a view, na pasta view/includes/template.php e passa o array \$data com o main_content
                        \$this->load->view('includes/template', \$data);
                        
                    } //fim index


                    function create() {
                        //carregando o model
                        \$this->load->model('".ucfirst($objeto)."_model');

                        \$create = \$this->input->post('create');
                        
                        if (\$create == 'true') { \n";
                            
                   for ($i=0; $i<sizeof($dados); $i++) {
                       $texto .= "                             \$this->".ucfirst($objeto)."_model->_".str_pad($dados[$i]['Field'], 20, " ")." = \$this->input->post('".$dados[$i]['Field']."');\n";
                   }
                   
                   $texto .= "
                            \$this->".ucfirst($objeto)."_model->create_".$objeto."();
                            redirect('".$objeto."_controller/index');
    

                        }
                        else {
                            //seta no main_content (templates) qual será a view a ser carregada
                            \$data['main_content']     = '".$objeto."_create';

                            //carrega a view, na pasta view/includes/template.php e passa o array \$data com o main_content
                            \$this->load->view('includes/template', \$data);
                        
                        }

                    } //fim create
                    

                   function delete(\$key_id) {
                        //carregando o model
                        \$this->load->model('".ucfirst($objeto)."_model');
                            
                        \$this->".ucfirst($objeto)."_model->delete_".$objeto."(\$key_id);
                            
                        redirect('".$objeto."_controller/index');
                   } //fim delete
                   

                   function update(\$key_id) {
                        //carregando o model
                        \$this->load->model('".ucfirst($objeto)."_model');

                        \$update = \$this->input->post('update');
                        
                        if (\$update == 'true') { \n";

                   for ($i=0; $i<sizeof($dados); $i++) {
                       if ($pk != $dados[$i]['Field']) {
                           $texto .= "                            \$this->".ucfirst($objeto)."_model->_".str_pad($dados[$i]['Field'], 20, " ")." = \$this->input->post('".$dados[$i]['Field']."');\n";
                       }
                   }

                   $texto .= "
                            \$this->".ucfirst($objeto)."_model->update_".$objeto."(\$key_id);
                            redirect('".$objeto."_controller/index');
                        }
                        else {
                            \$data['key_id']           = \$key_id;
                            
                            \$this->".ucfirst($objeto)."_model->read_".$objeto."(\$key_id);

                            //seta no main_content (templates) qual será a view a ser carregada
                            \$data['main_content']     = '".$objeto."_update';

                            //carrega a view, na pasta view/includes/template.php e passa o array \$data com o main_content
                            \$this->load->view('includes/template', \$data);
                        }
                   } //fim update

                } //fim class";
                self::gravar_linha($fp, $texto);
                self::fechar_arquivo($fp);
            }
        }
    }

    
    public function gerar_view_index($dados_objetos) {
        $dir_name  = 'application/views';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            $fp     = self::abrir_arquivo('index', $dir_name, 'lista');
            $texto  = "<div>";
            foreach ($dados_objetos as $objeto => $dados) {
                $texto .= "<input type=\"button\" class=\"button\" value=\"".ucfirst($objeto)."\" onclick=\"location.href='<?php echo base_url()?>index.php/".$objeto."_controller/'\" /><br/><br/>";
            }
            $texto .= "<div>";
            self::gravar_linha($fp, $texto);
            self::fechar_arquivo($fp);
        }
        
    }
    

    public function gerar_view_lista($dados_objetos) {
        $dir_name  = 'application/views';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            foreach ($dados_objetos as $objeto => $dados) {
                $pk = 'key';
                for ($i=0;$i<sizeof($dados);$i++) {
                    if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                        $pk = $dados[$i]['Field'];
                    }
                }
                $fp     = self::abrir_arquivo($objeto, $dir_name, 'lista');
                $texto  = "
                    <div>
                        <h1>Listagem: ".ucfirst($objeto)."</h1>
                        <input type=\"button\" class=\"button\" value=\"Menu\" onclick=\"location.href='<?php echo base_url()?>'\" />
                        <input type=\"button\" class=\"button\" value=\"Novo\" onclick=\"location.href='<?php echo base_url()?>index.php/".$objeto."_controller/create'\" />
                    </div>
                    <br/>
                    <div>
                        <?php if(empty(\$lista)) : ?>
                            <div class=\"ui-widget\">
                                <div style=\"margin-top: 20px; padding: 0 .7em;\" class=\"ui-state-highlight ui-corner-all\"> 
                                    <p><span style=\"float: left; margin-right: .3em;\" class=\"ui-icon ui-icon-info\"></span>
                                        <strong>Alerta:</strong> Não existem dados cadastrados. Clique em \"novo\" para inserir.</p>
                                </div>
                            </div>    
                        <?php else : ?>
                            <table border=\"1\" cellspacing=\"0\" cellpadding=\"5\">
                                <tr>
                                    <?php foreach(\$lista[0] as \$key => \$value) : ?>
                                        <td><?php echo \$key; ?></td>
                                    <?php endforeach ?>
                                    <td></td>
                                </tr>
                                <?php for(\$i=0; \$i<sizeof(\$lista); \$i++) : ?>
                                    <tr>
                                        <?php foreach(\$lista[\$i] as \$key => \$value) : ?>
                                            <td><?php echo \$value; ?></td>
                                        <?php endforeach ?>
                                            <td>
                                                <input type=\"button\" class=\"button\" value=\"Editar\" onclick=\"location.href='<?php echo base_url()?>index.php/".$objeto."_controller/update/<?php echo \$lista[\$i]['".$pk."']; ?>'\" />    
                                                <input type=\"button\" class=\"button\" value=\"Apagar\" onclick=\"location.href='<?php echo base_url()?>index.php/".$objeto."_controller/delete/<?php echo \$lista[\$i]['".$pk."']; ?>'\" />
                                            </td>    
                                    </tr>
                                <?php endfor ?>
                            </table>
                        <?php endif ?>
                    </div>                    
                    ";
                self::gravar_linha($fp, $texto);
                self::fechar_arquivo($fp);
            }
        }    
    }
 
    
 
   public function gerar_view_create($dados_objetos) {
        $dir_name  = 'application/views';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            foreach ($dados_objetos as $objeto => $dados) {
                $pk = 'key';
                for ($i=0;$i<sizeof($dados);$i++) {
                    if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                        $pk = $dados[$i]['Field'];
                    }
                }
                $fp     = self::abrir_arquivo($objeto, $dir_name, 'create');
                $texto  = "
                    <div>
                        <h1>Novo: ".ucfirst($objeto)."</h1>
                        <input type=\"button\" class=\"button\" value=\"Menu\" onclick=\"location.href='<?php echo base_url()?>'\" />
                        <input type=\"button\" class=\"button\" value=\"Lista\" onclick=\"location.href='<?php echo base_url()?>index.php/".$objeto."_controller'\" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_".$objeto."_create' id='frm_".$objeto."_create' method='POST' action='<?php echo base_url()?>index.php/".$objeto."_controller/create' >
                            <input type='hidden' name='create' id='create' value='true' />
                    ";
                for ($i=0; $i<count($dados); $i++) {
                    if (strtoupper(trim($dados[$i]['Key'])) != "PRI") {
                        $texto .= "
                            <label for='".$dados[$i]['Field']."'>".ucfirst($dados[$i]['Field'])."</label>
                            <input type='text' name='".$dados[$i]['Field']."' id='".$dados[$i]['Field']."'><br/>
                            ";
                    }
                }
                $texto .= "
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    ";
                self::gravar_linha($fp, $texto);
                self::fechar_arquivo($fp);
            }
        }    
    }
     

    
   public function gerar_view_update($dados_objetos) {
        $dir_name  = 'application/views';
        $criar_dir = self::criar_diretorio($dir_name);
        if ($criar_dir) {
            foreach ($dados_objetos as $objeto => $dados) {
                $pk = 'key';
                for ($i=0;$i<sizeof($dados);$i++) {
                    if (strtoupper(trim($dados[$i]['Key'])) == "PRI") {
                        $pk = $dados[$i]['Field'];
                    }
                }
                $fp     = self::abrir_arquivo($objeto, $dir_name, 'update');
                $texto  = "
                    <div>
                        <h1>Atualizar: ".ucfirst($objeto)." <br/> Codigo: <?php echo(\$key_id);?></h1>
                        <input type=\"button\" class=\"button\" value=\"Menu\" onclick=\"location.href='<?php echo base_url()?>'\" />
                        <input type=\"button\" class=\"button\" value=\"Lista\" onclick=\"location.href='<?php echo base_url()?>index.php/".$objeto."_controller'\" />
                    </div>
                    <br/>
                    <div>
                        <form name='frm_".$objeto."_update' id='frm_".$objeto."_update' method='POST' action='<?php echo base_url()?>index.php/".$objeto."_controller/update/<?php echo(\$key_id);?>' >
                            <input type='hidden' name='update' id='update' value='true' />
                    ";
                for ($i=0; $i<count($dados); $i++) {
                    if (strtoupper(trim($dados[$i]['Key'])) != "PRI") {
                        $texto .= "
                            <label for='".$dados[$i]['Field']."'>".ucfirst($dados[$i]['Field'])."</label>
                            <input type='text' name='".$dados[$i]['Field']."' id='".$dados[$i]['Field']."' value='<?php echo(\$this->".ucfirst($objeto)."_model->_".$dados[$i]['Field']."); ?>'><br/>
                            ";
                    }
                }
                $texto .= "
                            <input type='submit' class='button' value='Salvar' />
                            <input type='reset' class='button' value='Cancelar' />
                        </form>
                    </div>                    
                    ";
                self::gravar_linha($fp, $texto);
                self::fechar_arquivo($fp);
            }
        }    
    }
    
    
    
    public function copiar_aplicacao($diretorio, $destino) {
        
        if ($destino{strlen($destino) - 1} == '/') {
            $destino = substr($destino, 0, -1);
        }
        if (!is_dir($destino)) {
            mkdir($destino, 0777);
        }
        $folder = opendir($diretorio);
        
        while ($item = readdir($folder)) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (is_dir("{$diretorio}/{$item}")) {
                $copyd = self::copiar_aplicacao("{$diretorio}/{$item}", "{$destino}/{$item}");
            } else {
                copy("{$diretorio}/{$item}", "{$destino}/{$item}");
            }
        }
    }
    
    
    public function gerar_configuracao_database($database) {
        $handle     = fopen("../fontes/".$database."/application/config/database.php", "w+");
        $configs    = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
            /*
            | -------------------------------------------------------------------
            | DATABASE CONNECTIVITY SETTINGS
            | -------------------------------------------------------------------
            | This file will contain the settings needed to access your database.
            |
            | For complete instructions please consult the 'Database Connection'
            | page of the User Guide.
            |
            | -------------------------------------------------------------------
            | EXPLANATION OF VARIABLES
            | -------------------------------------------------------------------
            |
            |	['hostname'] The hostname of your database server.
            |	['username'] The username used to connect to the database
            |	['password'] The password used to connect to the database
            |	['database'] The name of the database you want to connect to
            |	['dbdriver'] The database type. ie: mysql.  Currently supported:
            |                mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
            |	['dbprefix'] You can add an optional prefix, which will be added
            |				 to the table name when using the  Active Record class
            |	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
            |	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
            |	['cache_on'] TRUE/FALSE - Enables/disables query caching
            |	['cachedir'] The path to the folder where cache files should be stored
            |	['char_set'] The character set used in communicating with the database
            |	['dbcollat'] The character collation used in communicating with the database
            |				 NOTE: For MySQL and MySQLi databases, this setting is only used
            | 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
            |				 (and in table creation queries made with DB Forge).
            | 				 There is an incompatibility in PHP with mysql_real_escape_string() which
            | 				 can make your site vulnerable to SQL injection if you are using a
            | 				 multi-byte character set and are running versions lower than these.
            | 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
            |	['swap_pre'] A default table prefix that should be swapped with the dbprefix
            |	['autoinit'] Whether or not to automatically initialize the database.
            |	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
            |							- good for ensuring strict SQL while developing
            |
            | The \$active_group variable lets you choose which connection group to
            | make active.  By default there is only one group (the 'default' group).
            |
            | The \$active_record variables lets you determine whether or not to load
            | the active record class
            */

            \$active_group = 'default';
            \$active_record = TRUE;

            \$db['default']['hostname'] = '".$_SESSION['conexao']['host'].":".$_SESSION['conexao']['port']."';
            \$db['default']['username'] = '".$_SESSION['conexao']['userid']."';
            \$db['default']['password'] = '".$_SESSION['conexao']['passwd']."';
            \$db['default']['database'] = '".$_SESSION['db']."';
            \$db['default']['dbdriver'] = 'mysql';
            \$db['default']['dbprefix'] = '';
            \$db['default']['pconnect'] = TRUE;
            \$db['default']['db_debug'] = TRUE;
            \$db['default']['cache_on'] = FALSE;
            \$db['default']['cachedir'] = '';
            \$db['default']['char_set'] = 'utf8';
            \$db['default']['dbcollat'] = 'utf8_general_ci';
            \$db['default']['swap_pre'] = '';
            \$db['default']['autoinit'] = TRUE;
            \$db['default']['stricton'] = FALSE;


            /* End of file database.php */
            /* Location: ./application/config/database.php */            
        ";
        fwrite($handle, $configs);
        fclose($handle);
        
        
    }
        
   
    public function compactar_instalacao($database) {
        `tar -cvzf ../fontes/$database.tgz ../fontes/$database`;
    }
    
    
    public function processar_lista_arquivos_gerados() {
        $lista = `ls -lt -m ../fontes/*.tgz`;
        if ($lista) {
            $valores = explode(', ', $lista);
            for ($i = 0; $i < count($valores); $i++) {
                $arquivo                    = str_replace('../fontes/', '', $valores[$i]);
                $arquivo                    = trim($arquivo);
                $projeto                    = explode('.', $arquivo);
                $arquivos[$projeto[0]]         = $arquivo;
            }
        }
        return $arquivos;
    }
    
    
    public function checar_conexao_db($tabela = "") {
        $host       = $_SESSION['conexao']['host'].":".$_SESSION['conexao']['port'];
        $conn_temp  = mysql_connect($host, $_SESSION['conexao']['userid'], $_SESSION['conexao']['passwd']) or false;
        if ($conn_temp && $tabela != "") {
            $ret = mysql_select_db($tabela, $conn_temp) or false;
        }
        return $conn_temp;
    }
    
    
    public function sql_pega_lista_dbs($conn) {
        $dbs = array();
        $sql = "SHOW DATABASES";
        $exe = mysql_query($sql, $conn) or false;
        if ($exe) {
            while ($ret = mysql_fetch_row($exe)) {
                $valor = array_map("trim", $ret);
                if ($valor[0] != "information_schema" && $valor[0] != 'mysql' && $valor[0] != 'test') {
                    $dbs[] = $valor[0];
                }
            } 
        }
        else {
            return false;
        }
        return $dbs;
    }
    
    
    public function pegar_lista_tabelas($conn) {
        $ret = $rec = array();
        $sdb = mysql_select_db($_SESSION['db'], $conn) or false;
        if ($sdb) {
            $sql = "SHOW TABLES";
            $exe = mysql_query($sql, $conn) or false;
            if ($exe) {
                $cnt = mysql_num_rows($exe) or false;
                if ($cnt) {
                    while ($rec = mysql_fetch_row($exe)) {
                        $ret[] = $rec[0];
                    }
                }
                else {
                    $ret = false;
                }
            }
            else {
                $ret = false;
            }
        }
        return $ret;
    }
    
    
    public function pegar_detalhes_tabelas($lst, $conn) {
        for ($i=0; $i<sizeof($lst); $i++) {
            $sql = "DESCRIBE ".$lst[$i];
            $exe = mysql_query($sql, $conn) or false;
            if ($exe) {
                $cnt = mysql_num_rows($exe) or false;
                if ($cnt) {
                    while ($rec = mysql_fetch_assoc($exe)) {
                        $ret[$lst[$i]][] = $rec;
                    }
                }
                else {
                    $ret = false;
                }
            }
            else {
                $ret = false;
            }
        }
        return $ret;
    }
    
    
    public function processar_html_tabelas($det) {
        $linhas = ceil(sizeof($det)/4);
        $contador = 0;
        $indice   = 0;
        $html     = "";
        foreach ($det as $tabela => $detalhes) {
            //cabeçalho
            if ($contador == 0 && $indice < sizeof($det)) {
                $html .= '<div class="column" style="width: 210px; float: left; padding-bottom: 100px;">';
            }
            $contador++;
                
            if ($indice <= sizeof($det)) {
                $html .= '  <div class="portlet" style="">';
                $html .= '      <div class="portlet-header">'.$tabela.'</div>';
                $html .= '      <div class="portlet-content">';
                $html .= '          <div><input type="checkbox" id="chk_tabela" name="chk_tabela" value="'.$tabela.'"  checked />Incluir tabela</div>';
                $html .= '          <div align="right" style="font-size: 10px" onclick="$(\'#conteudo_tabela_'.$tabela.'\').toggle(\'slow\')">Detalhes</div>';
                $html .= '              <div id="conteudo_tabela_'.$tabela.'" style="display: none">';
                $html .= '                  <div style="padding: 5px">';
                for ($j=0; $j<sizeof($detalhes); $j++) {
                    $primary_key = $detalhes[$j]['Key'] == 'PRI' ? ' *' : '';
                    $html .= '                  <div style="font-weight: bold">'.$detalhes[$j]['Field'].$primary_key.'</div>';
                    $html .= '                  <div style="font-size: 10px" align="right">'.$detalhes[$j]['Type'].'</div>';
                    $html .= '                  <div style="font-size: 10px" align="right">'.$detalhes[$j]['Extra'].'</div>';
                }
                $html .= '              </div>';
                $html .= '          </div>';
                $html .= '      </div>';
                $html .= '  </div>';
                
                $indice++;
            }    
            
            if ($contador == $linhas || $indice == sizeof($det)) {
                $html .= '</div> <!-- fim div class column -->';
                $contador = 0;
            }
        }
        return $html;
    }
    
    
    
    
    
} //endclass
?>
