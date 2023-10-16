<?php

namespace App\Models;


use CodeIgniter\Model;

/**
 * Database Configuration
 */
class Usuarios extends Model{
    public function listarUsuarios(){
        $usuarios = $this->db->query("select * from test");
        return $usuarios->getResult();
    }
}