<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Database Configuration
 */
class Recetas extends Model
{
    // public function listarUsuarios(){
    //     $usuarios = $this->db->query("select * from test");
    //     return $usuarios->getResult();
    // }

    function getData($busqueda)
    {

        $recetas = $this->db->query("select * from RecetasFarmacia where id_paciente = '".$busqueda."' ");
        return $recetas->getResult();


    }

    function ultima()
    {

        $recetas = $this->db->query("select p.nombre,p.primer_apellido,p.segundo_apellido,p.edad,rf.diagnostico,rf.medico_prescriptor,rf.numero_receta
        FROM RecetasFarmacia rf 
        inner join pacientes p on p.id = rf.id_paciente
        where rf.id = (  select id from RecetasFarmacia order by id desc limit 1)");
        return $recetas->getResult();


    }


    function ultimaB()
    {

        $recetas = $this->db->query("select CONCAT(p.nombre,' ',p.primer_apellido,' ',p.segundo_apellido),CONCAT('Edad: ',p.edad),curp,rf.diagnostico,rf.medico_prescriptor,rf.numero_receta
        FROM RecetasFarmacia rf 
        inner join pacientes p on p.id = rf.id_paciente
        where rf.id = (  select id from RecetasFarmacia order by id desc limit 1)");
        return $recetas->getResult();


    }


    function insertar($idpaciente,$diagnostico)
    {

        $insert = "INSERT INTO RecetasFarmacia (numero_receta, fecha_emision, medico_prescriptor,estado_receta,fecha_expiracion, id_paciente,diagnostico)
        VALUES (CONCAT('rec-',uuid()), now(), 'Dr. Yahir Bautista', 'Pendiente', now() + INTERVAL 1 month, '".$idpaciente."','".$diagnostico."')";


         $this->db->query($insert);


         $recetas = $this->db->query("select id from RecetasFarmacia order by id desc limit 1");
         return $recetas->getResult();
        //return $recetas->getResult();


    }

   
}
