<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Database Configuration
 */
class Pacientes extends Model
{
    // public function listarUsuarios(){
    //     $usuarios = $this->db->query("select * from test");
    //     return $usuarios->getResult();
    // }

    function getData($busqueda)
    {

        $usuarios = $this->db->query("select * from pacientes where nombre like '%".$busqueda."%' or primer_apellido like '%".$busqueda."%' or segundo_apellido like '%".$busqueda."%' ");
        return $usuarios->getResult();

    }


    function getPaciente($busqueda)
    {

        $pacientes = $this->db->query("select * from pacientes where id = '".$busqueda."' ");
        return $pacientes->getResult();





    }

    function guardarPaciente($nombreforma,$primerapforma,$segundoapforma,$curp ,$edad,$fecha_nacimiento,$genero){


    $insert = "INSERT INTO pacientes (nombre, primer_apellido, segundo_apellido,curp,edad, fecha_nacimiento,genero)
    VALUES ('".$nombreforma."','".$primerapforma."','".$segundoapforma."','".$curp."',".$edad.",'".$fecha_nacimiento."','".$genero."')";


     $this->db->query($insert);


    }



}
