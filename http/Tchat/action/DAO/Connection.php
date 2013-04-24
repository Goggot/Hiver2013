<?php
    require_once('action/lib/nusoap.php');

    class Connection{
	private $key;
        private $error;
	
	public static function getConnection()
	{
	    if (isset($_POST["login"])) {
                $soapClient = new nusoap_client('http://b63server.notes-de-cours.com/services.php', false);
                $this->error = $soapClient->getError();
                
                if (empty($this->error)) {
                    $this->key = $soapClient->call('connecter', array('nomUsager' => $_POST["login"], 'motDePasse' => md5($_POST["passwd"])));
                    if ($soapClient->fault)
                        $this->error = "(" . $soapClient->faultcode . ") " . $soapClient->faultstring;
                }
            }
	    return $this->error;
        }
    }