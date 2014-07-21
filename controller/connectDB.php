<?php

class ConnectDB
{
    private function callConfig()
    {
        $path = "../etc/config.xml";
        $configFILE = simplexml_load_file($path);

        return $configFILE;
    }

    public function openConnection($host, $username, $password, $dbname)
    {
        $config = $this->callConfig();

        $host = $config->host;
        $username = $config->username;
        $password = $config->password;
        $dbname = $config->dbname;

        $connection = mysql_connect($host, $username, $password);
        mysql_select_db($dbname, $connection);

    }

    public function closeConnection()
    {
        mysql_close();
    }
}