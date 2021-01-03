<?php
namespace Project\Util;

use RedBeanPHP\R;
use RedBeanPHP\OODBBean;

class DB {
    protected $connURL;

    protected $dbUser;
    protected $dbUserPassword;
    protected $conn;

    public function getDB(): array
    {
        return $this->conn;
    }

    public function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        $this->getDBCredentials();
        R::setup( $this->connURL, $this->dbUser, $this->dbUserPassword);
    }

    protected function getDBCredentials()
    {
        $hostName       = \getenv("HOST");
        $port           = \getenv("PORT");
        $dbName         = \getenv("MYSQL_DATABASE");
        $this->connURL  = \sprintf("mysql:host=%s;port=%s;dbname=%s",
                                    $hostName,
                                    $port,
                                    $dbName
                                );
        
        $this->dbUser         = \getenv("MYSQL_USER");
        $this->dbUserPassword = \getenv("MYSQL_PASSWORD");
    }

    public function addArray(array $data): ?int
    {
        $db = R::dispense('data');

        foreach($data as $key => $val)
        {
            $db[$key] = $val;
        }
        $id = $db->store($db);
        return $id;
    }

    public function getDataByID(int $id): ?OODBBean
    {
        $data = R::load( 'post', $id );

        return $data;
    }
}