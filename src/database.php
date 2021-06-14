<?php declare(strict_types = 1);
/**
 * Database wrapper class for PHP PDO
 */

 namespace SimplePi;

 class Database {

    public $db;

    public function __construct() {

    }

    public function setup($config) {
        // R::setup();      
        $this->db = $config;
    }

    public function query($query) {
        // write orm query builder function
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
            foreach($dbh->query('SELECT * from FOO') as $row) {
                print_r($row);
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
 }
