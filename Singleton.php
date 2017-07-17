<?php

/**
 * Class Singleton
 *
 * @desc
 *      Allows only one instance of the class
 *
 * @example
 *      You only wanted on object
 *      You only wanted one controller (MVC)
 *
 */
class Singleton
{
    /**
     * This stores the only instance of this class
     * @var bool|object
     */
    private static $instance = false;

    /**
     * This is how we get our single instance
     *
     * @return object
     */
    public static function getInstance()
    {
        // If we have no instance, create one
        if (self::$instance == false) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Singleton constructor.
     * Don't allow the "new Class" construct
     */
    protected function __construct() {}

    /**
     * Don't allow clones of this object
     */
    private function __clone() {}

    /**
     * Don't allow serialization of this object
     */
    private function __wakeup() {}
}

class Database extends Singleton
{

    protected $dsn;

    public function setDsn($dsn){
        $this->dsn = $dsn;
    }

    public function getDsn(){
        return $this->dsn;
    }
}

/**
 *
 */

$d1 = Database::getInstance();
$d1->setDsn('mysql://');
echo $d1->getDsn() . PHP_EOL;

// Getting the instance again will still use the same instance
$d2 = Database::getInstance();
$d2->setDsn('postgres://');
echo $d2->getDsn() . PHP_EOL;

$d3 = Database::getInstance();
$d3->setDsn('aws://');
echo $d3->getDsn() . PHP_EOL;