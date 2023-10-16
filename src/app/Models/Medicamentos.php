<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Database Configuration
 */
class Medicamentos extends Model
{
    // public function listarUsuarios(){
    //     $usuarios = $this->db->query("select * from test");
    //     return $usuarios->getResult();
    // }

    function ultima()
    {

        $recetas = $this->db->query("select rm.* from RecetasFarmacia rf
        inner join receta_medicamentos rm on rm.id_receta = rf.id
        where rf.id = (  select id from RecetasFarmacia order by id desc limit 1)");
        return $recetas->getResult();


    }



    function getData($busqueda)
    {

        $medicamentos = $this->db->query("select * from Medicamentos where nombre like '%".$busqueda."%' ");
        return $medicamentos->getResult();





    }



    function getMedicamento($busqueda)
    {

        $medicamentos = $this->db->query("select * from Medicamentos where id = '".$busqueda."' ");
        return $medicamentos->getResult();





    }

    function insertarMedicamentos($nombre,$tipo,$dosis,$receta_id)
    {

        $insert = "INSERT INTO receta_medicamentos (nombre, tipo, dosis, id_receta) VALUES ('".$nombre."', '".$tipo."', '".$dosis."', '".$receta_id."')";

       // return $insert;
         $this->db->query($insert);


        //  $recetas = $this->db->query("select id from RecetasFarmacia order by id desc limit 1");
        //  return $recetas->getResult();
        //return $recetas->getResult();


    }
}
