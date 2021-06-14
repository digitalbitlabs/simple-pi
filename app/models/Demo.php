<?php declare(strict_types = 1);
/**
 * Demo model class
 */

 namespace SimplePi\Models;

 use SimplePi\Database;

 class Demo {

    protected $db;
    protected $table = 'demo';

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function query($query) {
        return $this->db->query($query);
    }

 }