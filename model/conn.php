<?php
/**
* Esta classe é responsavel para o sistema singleton
* para chamar a funcao de singleton use: conn::mysql();
*                                        |___| |______|-> nome da funcao
*                                          |-> classe
*/
class conn
{
  private static $conn = null;

	/** Variable pour les données surchargées. */
	private $data = array();

  private function __construct(){
		# Récupération du fichier de configuration
		$this->config = parse_ini_file('../configs/config.ini', true);

		# création de la connexion
//		$host = @$_SERVER['HTTP_HOST'] == 'dev.torpedo.lan' ? 'development' : 'production';
		$host = 'production';
    self::$conn = mysql_connect($this->config[$host]['host'], 
                                $this->config[$host]['user'], 
                                $this->config[$host]['pass']);
    mysql_select_db($this->config[$host]['database'], self::$conn) or die(mysql_error());
    mysql_set_charset('utf8',self::$conn);
    date_default_timezone_set('America/Sao_Paulo');
  }


  #functions to enter the calling to singleton
  public static function mysql() {
    if (!isset(self::$conn)) new conn();
    return self::$conn;
  }


} //end class
?>