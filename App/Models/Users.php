<?php

namespace Gray\Test\Models;

use Gray\Test\Model;
use PDO;

class Users extends Model{

    public function retrieveUsers(){
        $query = "SELECT first_name, middle_name, last_name, email, profile_image FROM users";
        $db = static::getDB();
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}