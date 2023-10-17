<?php

namespace App\Controllers;

use App\Models\Pacientes;
use App\Models\Recetas;
use App\Models\Medicamentos;

use CodeIgniter\Controller;

// application/controllers/SearchController.php
class SearchController extends BaseController
{


    public function search()
    {

        $busqueda = $this->request->getPost('busqueda');

        $pacientes = new Pacientes();
        $datos = $pacientes->getData($busqueda);
        return json_encode($datos);
    }

    public function recetas()
    {

       $busqueda = $this->request->getPost('busqueda');

        $recetas = new Recetas();
        $datos = $recetas->getData($busqueda);
        return json_encode($datos);
    }

    public function buscarMedicamento()
    {

       $busqueda = $this->request->getPost('busqueda');

        $medicamentos = new Medicamentos();
        $datos = $medicamentos->getData($busqueda);
        return json_encode($datos);
    }

    public function buscarMedicamentoPorId()
    {

       $busqueda = $this->request->getPost('busqueda');

        $medicamentos = new Medicamentos();
        $datos = $medicamentos->getMedicamento($busqueda);
        return json_encode($datos);
    }

    public function guardarDatosReceta()
    {

       $datos = $this->request->getPost('datos');
       $datos = (array) json_decode($datos);
       $idpaciente = $this->request->getPost('idpaciente');
       $diagnostico = $this->request->getPost('diagnostico');

       $recetas = new Recetas();
       $medicamentos = new Medicamentos();

       $receta =   $recetas->insertar($idpaciente,$diagnostico);

       $receta_id = $receta[0]->id;
    //    var_dump($receta[0]->id);

       foreach($datos as $dato){

        $nombre =  $dato[0];
        $tipo = $dato[1];
        $dosis =  $dato[2];

        $medicamentos->insertarMedicamentos($nombre,$tipo,$dosis,$receta_id);

         //return json_encode($dato[0]);

       }

      
       return json_encode($diagnostico);
    }

    public function buscarPacientePorId()
    {

       $busqueda = $this->request->getPost('busqueda');
       

        $pacientes = new Pacientes();
        $datos = $pacientes->getPaciente($busqueda);
        return json_encode($datos);
    }


    public function guardarPaciente()
    {

        $nombreforma = $this->request->getPost('nombreforma');
        $primerapforma = $this->request->getPost('primerapforma');
        $segundoapforma = $this->request->getPost('segundoapforma');
        $curp = $this->request->getPost('curp');
        $edad = $this->request->getPost('edad');
        $fecha_nacimiento = $this->request->getPost('fecha_nacimiento');
        $genero = $this->request->getPost('genero');
        
        $pacientes = new Pacientes();
        $datos = $pacientes->guardarPaciente($nombreforma,$primerapforma,$segundoapforma,$curp ,$edad,$fecha_nacimiento,$genero);
        return json_encode($datos);
    }



    
}
