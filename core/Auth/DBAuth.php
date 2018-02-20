<?php

namespace Core\Auth;

use Core\Database\Database;

class DBAuth
{
    
    public function __construct(Database $db) 
    {
        $this->db = $db;
    }

    /**
     * Undocumented function
     *
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        if($user) {
            if($user->password === sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    public function logged()
    {
        return isset($_SESSION['auth']);
    }

}