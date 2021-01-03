<?php
namespace Project\Util;

use RedBeanPHP\R;
use RedBeanPHP\OODBBean;
use Project\Data\DataInterface\DataInterface;

class DBFacade {
    static protected $connURL;
    static protected $dbUser;
    static protected $dbUserPassword;
    
    static public function initialize()
    {
        self::connect();
        self::getDBCredentials();
    }

    static protected function connect()
    {
        R::setup( self::$connURL, self::$dbUser, self::$dbUserPassword);
        
        if( !R::testConnection() )
        {
            exit("Cannot connect to Database");
        }
    }

    static protected function getDBCredentials()
    {
        $hostName       = \getenv("HOST");
        $port           = \getenv("PORT");
        $dbName         = \getenv("MYSQL_DATABASE");
        self::$connURL  = \sprintf("mysql:host=%s;port=%s;dbname=%s",
                                    $hostName,
                                    $port,
                                    $dbName
                                );
        
        self::$dbUser         = \getenv("MYSQL_USER");
        self::$dbUserPassword = \getenv("MYSQL_PASSWORD");
    }

    static public function insert(DataInterface &$dataObject): int
    {
        $table = R::dispense($dataObject->getTableName());
        
        foreach($dataObject->tableFields() as $key => $val)
        {
            if($val)
            {
                $table[$key] = $val;
            }
        }

        $id = R::store($table);

        return $id;
    }

    static public function getId(DataInterface &$dataObject, int $id): void
    {
        $data = R::load( $dataObject->getTableName(), $id);

        foreach($dataObject->tableFields() as $key => $val)
        {
            $dataObject->$key = $data[$key];
        }
    }

    static public function getQuery(DataInterface &$dataObject, string $query, ?array $args): void
    {
        if($args)
        {
            $data = R::findOne( $dataObject->getTableName(), $query, $args);
        } else
        {
            // value of string should be quoted
            $data = R::findOne( $dataObject->getTableName(), $query);
        }

        if( !$data )
        {
            return;
        }

        foreach($dataObject->tableFields() as $key => $val)
        {
            $dataObject->$key = $data[$key];
        }
    }
}